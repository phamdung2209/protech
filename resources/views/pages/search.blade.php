@extends('layouts/master')

@section('contents')
    <main>
        <div class="main">
            @if (count($results) > 0)
                <h1 style="text-align: center; color: #333; font-weight: 500;">Search Results For: {{ $header__search }}
                </h1>
                <div class="notify__wrapper">
                    <div class="notify__wrapper-count">
                        Showing 1-1 of {{ count($results) }} results
                    </div>
                    <form class="notify__wrapper-select" method="get" class="">
                        <select name="" id="">
                            <option class="notify__wrapper-select--option" value="">Order by price: from low to
                                high
                            </option>
                            <option class="notify__wrapper-select--option" value="">Order by price: from high to
                                low
                            </option>
                            <option class="notify__wrapper-select--option" value="">Order by popularity</option>
                            <option class="notify__wrapper-select--option" value="">Order by rating</option>
                            <option class="notify__wrapper-select--option" value="">Latest</option>
                        </select>
                    </form>
                </div>


                <!-- Show product laptop-->
                <div class="body__banner-product">
                    <div class="body__title-product body__title-product--bg">
                        <div class="title__product-laptop">
                            laptop
                        </div>

                        <div class="title__product-laptop-sub">
                            <a href="" class="title__product-laptop-link">
                                TUF Gaming
                            </a>

                            <a href="" class="title__product-laptop-link">
                                Nitro 5
                            </a>

                            <a href="" class="title__product-laptop-link">
                                GF Series
                            </a>

                            <a href="" class="title__product-laptop-link">
                                Legion
                            </a>

                            <a href="" class="title__product-laptop-link">
                                Ideapad gaming
                            </a>

                            <a href="" class="title__product-laptop-link">
                                Strix G
                            </a>
                        </div>
                    </div>

                    <!-- element product -->

                    <div class="element__product">
                        @foreach ($results as $result)
                            {{-- @foreach ($products as $product) --}}
                            @if ($result->id_typeProduct == 1)
                                {{-- @if (str_contains(strtolower($product->name), strtolower($result))) --}}
                                <a href="details/{{ $result->id }}/{{ $result->name }}" class="list__product">
                                    {{-- <span class="excerpt">FREE 8GB DDR5 RAM</span>
                                    <span class="inner__text">-10%</span> --}}
                                    @if ($result->cost_old - $result->cost < 1000000)
                                        <span class="excerpt">FREE 8GB DDR5 RAM</span>
                                    @elseif ($result->cost_old - $result->cost >= 1000000 && $result->cost_old - $result->cost < 3000000)
                                        <span class="excerpt">Refund 1,000,000 VND</span>
                                    @elseif ($result->cost_old - $result->cost >= 3000000 && $result->cost_old - $result->cost < 4000000)
                                        <span class="excerpt">VOUCHER 1.000.000 VNĐ</span>
                                    @else
                                        {{-- <span class="excerpt"></span> --}}
                                    @endif

                                    <span class="inner__text">
                                        -{{ number_format((($result->cost_old - $result->cost) / $result->cost_old) * 100, 0) }}%
                                    </span>
                                    <div class="element__product-info">
                                        <div class="element__product-info--img">
                                            <img src="{{ asset('images/' . $result->image) }}" alt=""
                                                class="element__product-img">
                                        </div>
                                        <div class="element__product-title">
                                            {{ Str::limit($result->name, $limit = 51, $end = '...') }}

                                        </div>

                                        <div class="star-rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </div>

                                        <div class="element__product-costs">
                                            <del class="element__product-costs--old">30,490,000 <u>đ</u></del>
                                            <div class="element__product-costs--new">
                                                {{ number_format($result->cost, 0, ',', ',') }}
                                                <u>đ</u>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="element__product-details">
                                        <div>
                                            <img src="{{ asset('images/cpu.png') }}" alt="">
                                            <span>{{ $result->cpu }}</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/vga.png') }}" alt="">
                                            <span>{{ $result->gpu }}</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/ram.png') }}" alt="">
                                            <span>{{ $result->ram }}</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/storage.png') }}" alt="">
                                            <span>{{ $result->storage }}</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/baohanh.png') }}" alt="">
                                            <span>{{ $result->warranty_period }}</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/screen.png') }}" alt="">
                                            <span>{{ $result->screen_size }}</span>
                                        </div>
                                    </div>
                                </a>
                                {{-- @endif --}}
                            @elseif ($result->id_typeProduct == 2 || $result->id_typeProduct == 3 || $result->id_typeProduct == 5)
                                <a href="details/{{ $result->id }}/{{ str_replace('/', '-', $result->name) }}"
                                    class="list__product">
                                    {{-- <span class="inner__text">-14%</span>
                                    <span class="excerpt">VOUCHER 1.000.000 VNĐ</span> --}}

                                    <span class="inner__text">
                                        {{-- -14% --}}
                                        -{{ number_format((($result->cost_old - $result->cost) / $result->cost_old) * 100, 0) }}%
                                    </span>

                                    @if ($result->cost_old - $result->cost < 500000)
                                        <span class="excerpt">FREE 8GB DDR5 RAM</span>
                                    @elseif ($result->cost_old - $result->cost >= 500000 && $result->cost_old - $result->cost < 1000000)
                                        <span class="excerpt">Refund 1,000,000 VND</span>
                                    @elseif ($result->cost_old - $result->cost >= 1000000 && $result->cost_old - $result->cost < 2000000)
                                        <span class="excerpt">VOUCHER 1.000.000 VNĐ</span>
                                    @else
                                    @endif

                                    <div class="element__product-info">
                                        <div class="element__product-info--img">
                                            <img src="{{ asset('images/' . $result->image) }}" alt=""
                                                class="element__product-img">
                                        </div>

                                        <div class="element__product-title">
                                            {{ Str::limit($result->name, $limit = 51, $end = '...') }}
                                        </div>

                                        <div class="star-rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </div>

                                        <div class="element__product-costs">
                                            <del
                                                class="element__product-costs--old">{{ number_format($result->cost_old, 0, ',', ',') }}<u>đ</u></del>
                                            <div class="element__product-costs--new">
                                                {{ number_format($result->cost, 0, ',', ',') }} <u>đ</u></div>
                                        </div>
                                    </div>

                                    <div class="element__product-details">
                                        <div>
                                            <img src="{{ asset('images/screen size.png') }}" alt="">
                                            <span>24 inch</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/solution.png') }}" alt="">
                                            <span>FHD 1920 * 1080</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/screen type.png') }}" alt="">
                                            <span>IPS</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/heart.png') }}" alt="">
                                            <span>180 Hz (OC)</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/timer.png') }}" alt="">
                                            <span>1ms MPRT</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/color mode.png') }}" alt="">
                                            <span>95% DCI-P3</span>
                                        </div>
                                    </div>
                                </a>
                            @elseif ($result->id_typeProduct == 4 || $result->id_typeProduct == 6 || $result->id_typeProduct == 7)
                                <a href="{{ route('details', [$result->id, str_replace(['/', '%'], ['-', '-'], $result->name)]) }}"
                                    class="list__product">
                                    {{-- <span class="inner__text">-14%</span> --}}
                                    {{-- <span class="excerpt">VOUCHER 1.000.000 VNĐ</span> --}}
                                    <span class="inner__text">
                                        {{-- -14% --}}
                                        -{{ number_format((($result->cost_old - $result->cost) / $result->cost_old) * 100, 0) }}%
                                    </span>

                                    @if ($result->cost_old - $result->cost < 500000)
                                        <span class="excerpt">FREE 8GB DDR5 RAM</span>
                                    @elseif ($result->cost_old - $result->cost >= 500000 && $result->cost_old - $result->cost < 1000000)
                                        <span class="excerpt">Refund 1,000,000 VND</span>
                                    @elseif ($result->cost_old - $result->cost >= 1000000 && $result->cost_old - $result->cost < 2000000)
                                        <span class="excerpt">VOUCHER 1.000.000 VNĐ</span>
                                    @else
                                    @endif
                                    <div class="element__product-info">
                                        {{-- <div class="element__product-info--img">
                                            <img src="{{ asset('images/logitech.png') }}" alt=""
                                                class="element__product-img">
                                        </div> --}}
                                        <div class="element__product-info--img">
                                            <img src="{{ asset('images/' . $result->image) }}" alt=""
                                                class="element__product-img">
                                        </div>
                                        <div class="element__product-title">
                                            {{ $result->name }}
                                        </div>

                                        <div class="star-rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </div>

                                        <div class="element__product-costs">
                                            <del class="element__product-costs--old">
                                                {{ number_format($result->cost_old, 0, ',', ',') }}
                                                <u>đ</u></del>
                                            <div class="element__product-costs--new">
                                                {{ number_format($result->cost, 0, ',', ',') }}
                                                <u>đ</u>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="element__product-details">
                                        <div>
                                            <img src="{{ asset('images/connector.png') }}" alt="">
                                            <span>Wireless</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/mouse.png') }}" alt="">
                                            <span>Gaming</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/charging.png') }}" alt="">
                                            <span>Type C</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/color.png') }}" alt="">
                                            <span>Black</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/brand.png') }}" alt="">
                                            <span>Logitech</span>
                                        </div>

                                        <div>
                                            <img src="{{ asset('images/delivery.png') }}" alt="">
                                            <span>Free Nationwide</span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            {{-- @endforeach --}}
                        @endforeach
                    </div>

                    <div class="view__all-products">
                        <a href="$$" class="view__all-products-link">
                            <i class="far fa-eye fa-bounce "></i>
                            <span> View all products >></span>
                        </a>
                    </div>
                </div>

                {{-- @foreach ($results as $result)
                    @if ($result->id_typeProduct == 2)
                        
                    @endif
                @endforeach --}}
            @else
                <h1 style="text-align: center; color: #333; font-weight: 500;">Search Results For:
                    {{ $header__search }}
                </h1>
                <div class="cart__null">
                    <div class="cart__null-notify" style="width: 31%;">
                        <i style="    
                        color: #1e85be;
                        margin-right: 15px;
                        font-size: 1.6rem;
                        font-weight: bold;"
                            class="fa-brands fa-opencart"></i>
                        It seems we can't find what you're looking for.
                    </div>

                    <a style="width: 15%;" href="/" class="cart__null-btnBack title__product-laptop-link">
                        Back to the store
                    </a>
                </div>
            @endif
        </div>
    </main>
@endsection
