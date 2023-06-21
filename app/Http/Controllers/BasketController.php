<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Classes\Basket;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();

        $categories = Category::get();
        return view('basket', compact('order', 'categories'));
    }

    public function basketConfirm(Request $request)
    {
        // $email = Auth::check() ? Auth::user()->email : $request->email;
        if (Auth::check()) {
            $email = Auth::user()->email;
        } else {
            $email= $request->email;
        }
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|string|regex:/^\+7-\d{3}-\d{3}-\d{2}-\d{2}$/i',
            'recieve_method' => 'required',
            // 'address' => 'required',
        ], [
            'name.required' => 'Please enter your name.',
            'phone' => 'Номер телефона введен неверно',
            'recieve_method.required' => 'Please select a receive method.',
            // 'address.required' => 'Please enter your address.',
        ]);
        //если пользователь авторизован, то берется его email, если нет - нужно указать
        if ((new Basket())->saveOrder($request->name, $request->phone, $request->recieve_method, $request->address, $email)) {
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Товар не доступен для заказа в полном объеме');
        }

        Order::eraseOrderSum();

        return redirect()->route('index');
    }


    public function basketPlace()
    {
        $basket = new Basket();
        $order = $basket->getOrder();
        $order->status = 'новый';
        if (!$basket->countAvailable()) {
            session()->flash('warning', 'Товар не доступен для заказа в полном объеме');
            return redirect()->route('basket');
        }
        $categories = Category::get();
        return view('order', compact('order', 'categories'));
    }
    public function basketPlaceDeliver()
    {
        $categories = Category::get();
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::findOrFail($orderId);
        return view('orderDeliver', compact('order', 'categories'));
    }

    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);

        if ($result) {
            session()->flash('success', 'Добавлен товар '.$product->name);
        }
        // else {
        // session()->flash('warning', 'Товар '.$product->name . ' в большем кол-ве не доступен для заказа');
        // }

        if ($product->count < 5) {
            session()->flash('warning', 'Товар '.$product->name . ' в большем кол-ве не доступен для заказа');
        }
        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);

        session()->flash('warning', 'Удален товар  ' . $product->name);

        return redirect()->route('basket');
    }
}
