<!-- <div class="product-card m-2 mb-3 mt-0">
    <div class="labels">
        @if ($product->isNew())
            <span class="badge badge-success">Новинка</span>
        @endif
        @if ($product->isRecommend())
            <span class="badge badge-warning">Рекомендуемые</span>
        @endif
        @if ($product->isHit())
            <span class="badge badge-danger">Хит</span>
        @endif
    </div>
    <a href="{{route('product', [isset($category) ? $category->code : $product->category->code, $product->code])}}">
      <img class="product-image" src="{{ Storage::url($product->image) }}" alt="">
    </a>
    <div class="product-card-body">
      <div class="prod-info d-flex ">
        <div>
            <p class="fs-7 text-wrap m-0 fw-700" style="width: 9rem;">{{$product->name}} </p>
            <p class="fs-8 m-0 text-muted">Арт: {{$product->code}}</p>
        </div>
        <div class="flex-column">
            <p class="fs-7 mb-2 fw-700">{{$product->price}} ₽</p>
        </div>
      </div>
      {{-- <a href="" class="card-button"><button class="card-button">Добавить в корзину</button></a> --}}
        <form action="{{route('basket-add', $product)}}" method="POST">
            <button type="submit" class="card-button" role="button">Добавить в корзину</button>
            @csrf
        </form>
    </div>
  </div> -->

  <li class="product-wrapper">
        <div class="labels">
            @if ($product->isNew())
                <span class="badge badge-success">Новинка</span>
            @endif
            @if ($product->isRecommend())
                <span class="badge badge-warning">Рекомендуемые</span>
            @endif
            @if ($product->isHit())
                <span class="badge badge-danger">Хит</span>
            @endif
        </div>
        <div class="product">
           <div class="product-photo">
                <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}">
                    <img class="product-image" src="{{ Storage::url($product->image) }}" alt="">
                </a>
           </div>
           <div class="product-body">
                <p class="fs-7 m-0 fw-700" >{{$product->name}} </p>
                <p class="product-code m-0 text-muted">Артикул: {{$product->code}}</p>
                <p class="product-price mb-2 fw-700">{{$product->price}} ₽</p>

                @if ($product->isAvailable())
                    <form action="{{route('basket-add', $product)}}" method="POST">
                        <button type="submit" class="cart-button mt-1" role="button">Добавить в корзину</button>
                        @csrf
                    </form>
                @else
                <button type="submit" class="cart-button mt-1" role="button" style="background-color: white; color: black; border: 2px solid white;" disabled="disabled">Товара нет в наличии</button>
                        @csrf
                @endif

           </div>
        <div>
   </li>
