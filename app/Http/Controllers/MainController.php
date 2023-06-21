<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;



class MainController extends Controller
{
    public function index(ProductsFilterRequest $request){
        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
        foreach (['hit', 'recommend', 'new'] as $field) {
            if ($request->has($field)){
                $productsQuery->$field();
            }
        }

        $sort = $request->input('sort', 'name');
        switch ($sort) {
            case 'price_high':
                $productsQuery->orderByDesc('price');
                break;
            case 'price_low':
                $productsQuery->orderBy('price');
                break;
            case 'created_at_new':
                $productsQuery->orderByDesc('created_at');
                break;
            case 'created_at_old':
                $productsQuery->orderBy('created_at');
                break;
            default:
                $productsQuery->orderBy('name');
                break;
        }

        $products = $productsQuery->paginate(12)->withPath("?" . $request->getQueryString());
        $categories = Category::get();

        // if($request->has('category_id')){
        //     $products = Product::where('category_id', $request->category_id)->get();
        // }
        return view('index', ['products' => $products, 'categories' => $categories]);
    }

    public function categories(Request $request){
        $categories = Category::get();
        return view('categories', ['categories' => $categories]);
    }


    public function category(Request $request, $code){
        //
        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
        foreach (['hit', 'recommend', 'new'] as $field) {
            if ($request->has($field)){
                $productsQuery->$field();
            }
        }

        $sort = $request->input('sort', 'name');
        switch ($sort) {
            case 'price_high':
                $productsQuery->orderByDesc('price');
                break;
            case 'price_low':
                $productsQuery->orderBy('price');
                break;
            case 'created_at_new':
                $productsQuery->orderByDesc('created_at');
                break;
            case 'created_at_old':
                $productsQuery->orderBy('created_at');
                break;
            default:
                $productsQuery->orderBy('name');
                break;
        }

        $products = $productsQuery->paginate(12)->withPath("?" . $request->getQueryString());
        //
        $categories = Category::get();
        $category = Category::where('code', $code)->first();
        return view('category', compact('category', 'categories', 'products'));
    }

    public function product($category, $productCode){
        $product = Product::withTrashed()->byCode($productCode)->first();
        $categories = Category::get();
        return view('product', compact('product', 'categories'));
    }

    public function subscribe(SubscriptionRequest $request, Product $product)
    {
        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('success', 'Спасибо, мы сообщим вам о поступлении товара');
    }

    public function aboutUs(){
        $products = Product::latest()->limit(5)->get();
        $categories = Category::get();
        return view('aboutUs', ['products' => $products, 'categories' => $categories]);
    }
    public function main(){
        $products = Product::paginate(6);
        $categories = Category::get();
        return view('main', ['products' => $products, 'categories' => $categories]);
    }
    public function service(){
        $products = Product::paginate(6);
        $categories = Category::get();
        return view('service', ['products' => $products, 'categories' => $categories]);
    }

    public function search(Request $request)
    {
        $categories = Category::get();
        $s = $request->s;
        $products = Product::where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate(12);
        return view('index', ['products' => $products, 'categories' => $categories]);
    }

}
