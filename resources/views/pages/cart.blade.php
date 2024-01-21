@extends('layouts/master')

@section('contents')
    <!-- main -->
    <main>
        <div class="main main__carts">
            @php
                $productCount = 0;
                $totalPrice0 = 0;
                $totalPrice1 = 0;
                $countPro = 0;
            @endphp
            @if (!session('username') && !session('password'))
                {{-- if no have --}}
                <div class="cart__null">
                    <div class="cart__null-notify">
                        <i style="    
                        color: #1e85be;
                        margin-right: 15px;
                        font-size: 1.6rem;
                        font-weight: bold;"
                            class="fa-brands fa-opencart"></i>
                        There are no products in the cart.
                    </div>

                    <a href="/" class="cart__null-btnBack title__product-laptop-link">
                        Back to the store
                    </a>
                </div>
            @else
                {{-- if have  --}}
                @foreach ($accounts as $account)
                    @foreach ($carts as $cart)
                        @foreach ($cart_pros as $cart_pro)
                            @foreach ($products as $product)
                                @if ($account->id == $cart->id_user)
                                    @if ($cart->id == $cart_pro->id_cart && $product->id == $cart_pro->id_product)
                                        @if ($account->cart && $cart->cart_pro && $product->cart_pro)
                                            @if (session('id') == $cart->id_user)
                                                @php
                                                    $productCount++;
                                                    // $totalPrice1 += $product->cost * $cart_pro->quantity;
                                                    $countPro += $cart_pro->quantity;
                                                @endphp
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach


                @if ($productCount === 0)
                    {{-- if no have --}}
                    <div class="cart__null">
                        <div class="cart__null-notify">
                            <i style="    
                            color: #1e85be;
                            margin-right: 15px;
                            font-size: 1.6rem;
                            font-weight: bold;"
                                class="fa-brands fa-opencart"></i>
                            There are no products in the cart.
                        </div>

                        <a href="/" class="cart__null-btnBack title__product-laptop-link">
                            Back to the store
                        </a>
                    </div>
                @else
                    <div class="main__cart main__cart-product">
                        <table class="cart-product__coupon">
                            <thead>
                                <tr>
                                    <th id="cart-product__coupon--color"></th>
                                    <th id="cart-product__coupon--color"></th>
                                    <th id="cart-product__coupon--color">Product</th>
                                    <th id="cart-product__coupon--color">Cost</th>
                                    <th id="cart-product__coupon--color">Quantity</th>
                                    <th id="cart-product__coupon--color">Into Money</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- info coupon -->

                                @foreach ($accounts as $account)
                                    @foreach ($carts as $cart)
                                        @foreach ($cart_pros as $cart_pro)
                                            @foreach ($products as $product)
                                                @if ($account->id == $cart->id_user)
                                                    @if ($cart->id == $cart_pro->id_cart && $product->id == $cart_pro->id_product)
                                                        @if ($account->cart && $cart->cart_pro && $product->cart_pro)
                                                            @if (session('id') == $cart->id_user)
                                                                @php
                                                                    $totalPrice1 += $product->cost * $cart_pro->quantity;
                                                                    $countPro += $cart_pro->quantity;
                                                                @endphp

                                                                <tr>
                                                                    <td id="cart-product__coupon--color">
                                                                        <a style="color: #b8b8b8; font-size: 2rem;" href="{{ route('removeProductFromCart', ['id' => $product->id]) }}" class="fa-regular fa-circle-xmark"></a>
                                                                    </td>
                                                                    <td id="cart-product__coupon--color">
                                                                        <img class="cart-product__coupon-img"
                                                                            src="{{asset('images/' . $product -> image)}}" alt="">
                                                                    </td>
                                                                    <td id="cart-product__coupon--color">
                                                                        <a href="details/{{ $product->id }}/{{ str_replace('/', '-', $product->name) }}"
                                                                            class="cart__ịnner-title cart__ịnner-title--color">
                                                                            {{ $product->name }}
                                                                        </a>
                                                                        <a class="cart__ịnner-title cart__ịnner-title--color"
                                                                            href="details/{{ $product->id }}/{{ str_replace('/', '-', $product->name) }}"
                                                                            style="display: block;
                                                                font-size: 0.7em;
                                                                font-style: italic;
                                                                font-weight: 700;">
                                                                            Edit Options
                                                                        </a>

                                                                        <div class="cart__ịnner-promotion">
                                                                            <div>
                                                                                Promotional Package:
                                                                                &nbsp;
                                                                            </div>

                                                                            <div class="cart__ịnner-promotion--select">
                                                                                abc
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td id="cart-product__coupon--color"
                                                                        class="price-product__cost">
                                                                        {{ number_format($product->cost, 0, ',', ',') }}
                                                                        <u>đ</u>
                                                                    </td>
                                                                    <td id="cart-product__coupon--color">
                                                                        <input type="number"
                                                                            value="{{ $cart_pro->quantity }}"
                                                                            title="Quantity" min="1">
                                                                    </td>
                                                                    <td id="cart-product__coupon--color"
                                                                        class="price-product__cost">
                                                                        {{-- 39,990,000  --}}
                                                                        @php
                                                                            $totalPrice0 += $product->cost * $cart_pro->quantity;
                                                                        @endphp
                                                                        {{ number_format($totalPrice0, 0, ',', ',') }}
                                                                        <u>đ</u>
                                                                    </td>
                                                                    @php
                                                                        $totalPrice0 = 0;
                                                                    @endphp
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                                <!-- end -->


                                <!-- btn update -->
                                <tr>
                                    <td colspan="6">
                                        <a href="" class="cart-product__btnUpdate">
                                            Cart Update
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="main__cart main__cart-totals">
                        <div class="cart-product__coupon">
                            <div class="cart-product__coupon-title">Cart Totals</div>
                        </div>

                        <div style="margin-top: 40px; padding: 0 20px;">
                            <div style=" display: flex; justify-content: space-between; align-items: center;">
                                <div
                                    style="color: #4f4f4f;
                    font-size: 1.4rem;
                    font-weight: bold;">
                                    Cost</div>
                                <div
                                    style="color: #4f4f4f;
                    font-size: 1.4rem;
                    font-weight: bold;">
                                    {{ number_format($totalPrice1, 0, ',', ',') }}
                                    <u> ₫</u>
                                </div>
                            </div>

                            <div
                                style=" display: flex; justify-content: space-between; align-items: center; margin: 30px 0;">
                                <div
                                    style="color: #4f4f4f;
                    font-size: 1.4rem;
                    font-weight: bold;">
                                    Totals</div>
                                <div
                                    style="color: #4f4f4f;
                    font-size: 1.4rem;
                    font-weight: bold;">
                                    {{ number_format($totalPrice1, 0, ',', ',') }}
                                    <u>đ</u>
                                </div>
                            </div>

                            <a onclick="updating()" class="title__product-laptop-link"
                                style="font-size: 1.4rem;
                font-weight: 500;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #F50912;
                color: #fff;
                cursor: pointer;
                padding: 12px 0;">Make
                                Payment</a>
                        </div>
                    </div>
                @endif

            @endif
        </div>
    </main>
@endsection
