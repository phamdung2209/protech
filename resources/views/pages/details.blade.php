@extends('layouts/master')

@section('contents')
    <!-- main -->
    <main>
        <div class="main">
            <div class="nav__link">

                <!-- categories -->
                <a href="LINK NÀY CHỨA VIRUS" rel="noopener noreferrer">
                    @foreach ($products as $product)
                        @foreach ($type_products as $type_product)
                            @if ($product->id == $id)
                                @if ($product->id_typeProduct == $type_product->id)
                                    {{ $type_product->description }}
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </a>
                <span class="nav_separator"> » </span>
                <a href="LINK NÀY CHỨA VIRUS" rel="noopener noreferrer">
                    {{-- Laptop  --}}
                    @foreach ($products as $product)
                        @foreach ($type_products as $type_product)
                            @if ($product->id == $id)
                                @if ($product->id_typeProduct == $type_product->id)
                                    {{ $type_product->description }}
                                @endif
                            @endif
                        @endforeach
                    @endforeach

                    @foreach ($products as $product)
                        @foreach ($brands as $brand)
                            @if ($product->id == $id)
                                @if ($product->id_brand == $brand->id)
                                    <span style="text-transform: capitalize;">{{ $brand->name }}</span>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    {{-- Acer --}}
                </a>
                <span class="nav_separator"> » </span>
                <a href="có virus nek" rel="noopener noreferrer">
                    @foreach ($products as $product)
                        @if ($product->id == $id)
                            <span style="text-transform: capitalize;">{{ $product->description }}</span>
                        @endif
                    @endforeach
                </a>

            </div>

            <div class="detail__product">
                <h2 class="detail__product-title">
                    {{-- Laptop Acer Predator Helios Neo 16 PHN16-71-59TN Geforce RTX 4060 8GB Intel Core i5
                    13500HX 16GB 512GB 16″ WQXGA IPS 165Hz RGB 4-Zone Win11 N9.QJSWW.002 --}}
                    @foreach ($products as $product)
                        @if ($product->id == $id)
                            {{ $product->name }}
                        @endif
                    @endforeach
                </h2>

                <div class="detail__product-element">
                    <div class="detail__product-element--top">
                        <div class="detail__star-rate">
                            <!-- <i class="fa-regular fa-star"></i>-->


                            <i class="fa-sharp fa-solid fa-star a1"></i>
                            <i class="fa-sharp fa-solid fa-star a2"></i>
                            <i class="fa-sharp fa-solid fa-star a3"></i>
                            <i class="fa-sharp fa-solid fa-star a4"></i>
                            <i class="fa-sharp fa-solid fa-star a5"></i>

                            <i class="fa-regular fa-star a2"></i>
                            <i class="fa-regular fa-star a3"></i>
                            <i class="fa-regular fa-star a4"></i>
                            <i class="fa-regular fa-star a5"></i>
                        </div>

                        <div class="detail__star-user">
                            (There are 13 votes)
                        </div>

                        <div class="detail__brand nav__link">
                            <span style="color: #333;" class="">Brand: </span>
                            @foreach ($products as $product)
                                @foreach ($brands as $brand)
                                    @if ($product->id == $id)
                                        @if ($product->id_brand == $brand->id)
                                            <a href="{{ $brand->name }}" class="detail__brand--color">
                                                <span style="text-transform: uppercase;">{{ $brand->name }}</span>
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="detail__product-element--bottom">
                        <i class="fa-solid fa-shield-halved"></i> Genuine 12 month warranty.
                    </div>
                </div>
            </div>

            <div class="line"></div>

            <div class="details">
                <div class="detail__pro-right">
                    <div class="pro-right-img-main">
                        @foreach ($products as $product)
                            @if ($product->id == $id)
                                <img src="{{ asset('images/' . $product->image) }}" alt="">
                            @endif
                        @endforeach

                    </div>
                    @php
                        $countImage = 0;
                    @endphp
                    <div class="pro-right-img-nav">
                        @foreach ($products as $product)
                            @foreach ($images as $image)
                                @if ($product->id == $id)
                                    @if ($image->id_product == $id && $countImage < 4)
                                        @php
                                            $filePath = json_decode($image->filePath, true);
                                            // $imgDes = $filePath[1];
                                            $imgNav = $filePath[0];
                                        @endphp
                                        <div class="pro-right-img-nav--a">
                                            <img src="{{ asset('images/' . $imgNav) }}" alt="">
                                        </div>
                                        @php
                                            $countImage++;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                        @if ($countImage === 0)
                            <div class="pro-right-img-nav--a">
                                <img src="{{ asset('images/1689518880_OIP.jpg') }}" alt="">
                            </div>

                            <div class="pro-right-img-nav--a">
                                <img src="{{ asset('images/1689518880_OIP.jpg') }}" alt="">
                            </div>

                            <div class="pro-right-img-nav--a">
                                <img src="{{ asset('images/1689518880_OIP.jpg') }}" alt="">
                            </div>

                            <div class="pro-right-img-nav--a">
                                <img src="{{ asset('images/1689518880_OIP.jpg') }}" alt="">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="detail__pro-left">
                    <div class="pro-left-cost">
                        <del class="element__product-costs--old pro-left-cost--old">
                            @foreach ($products as $product)
                                @if ($product->id == $id)
                                    {{ number_format($product->cost_old, 0, ',', ',') }}
                                @endif
                            @endforeach
                            <u>đ</u>
                        </del>
                        <div class="element__product-costs--new pro-left-cost--new">
                            @foreach ($products as $product)
                                @if ($product->id == $id)
                                    {{ number_format($product->cost, 0, ',', ',') }}
                                @endif
                            @endforeach
                            <u>đ</u>
                        </div>
                    </div>

                    <span class="vat">*Prices above include VAT</span>

                    <div class="pro-left__info-status">
                        <div class="pro-left__status">
                            Stocking
                        </div>

                        <div class="pro-left__promotion">
                            <h5>
                                Choose a promotion package
                            </h5>

                            <div class="pro-left__choice">
                                <input name="promotion" id="a" type="radio" checked>
                                <label for="a">Shock price package</label>
                            </div>

                            <div class="pro-left__choice">
                                <input name="promotion" id="b" type="radio">
                                <label for="b">Upgrade pack</label>
                            </div>

                            <div class="pro-left__choice">
                                <input name="promotion" id="c" type="radio">
                                <label for="c">Gift wrapping</label>
                            </div>

                            <div class="pro-left__choice">
                                <input name="promotion" id="d" type="radio">
                                <label for="d">0% interest installment payment via credit card</label>
                            </div>

                            <div class="tc-row">
                                <div class="pro-left__extra-offer">
                                    Extra Offer
                                </div>

                                <div class="tc-cell-description">
                                    <span>♦ Balo <b>Gaming Predator SUV</b></span><br>
                                    <span>♦ Shockproof bag.</span><br>
                                    <span>♦ Get <b>8GB DDR4 Laptop</b> RAM is only <span
                                            class="element__product-costs--new">450,000 VND</span> (when purchased with
                                        Laptop).</span><br>
                                    <span>♦ Get <b>16GB DDR4 Laptop</b> RAM is only <span
                                            class="element__product-costs--new">850,000 VND</span> (when purchased with
                                        Laptop).</span><br>
                                    <span>♦ Get <b>8GB DDR5 Laptop</b> RAM is only <span
                                            class="element__product-costs--new">890,000 VND</span> (when purchased with
                                        Laptop).</span><br>
                                    <span>♦ Immediately receive <b>mouse pad size xxxl</b> when <span
                                            class="element__product-costs--new">rating 5 stars</span>.</span><br>
                                    <span>♦ Discount <span class="element__product-costs--new">50,000 VND</span> when
                                        buying more <b>Gaming Gear</b>.</span><br>
                                    <span>♦ Instant discount of <span class="element__product-costs--new">100,000 VND
                                        </span>when buying more <b>Monitors</b>.</span><br>
                                    <span>♦ Renew in 7 days (if hardware failure).</span><br>
                                    <span>♦ Free machine cleaning.</span><br>
                                    <span>♦ Free delivery nationwide.</span><br>
                                </div>

                                <div class="btn__payment">
                                    {{-- <input type="number" value="1" title="Quantity" min="1" name="quantity"> --}}

                                    <form action="{{ route('addCart', ['id' => $id]) }}" method="get">
                                        @csrf
                                        <div class="btn__payment">
                                            <input id="quantityInput" class="input" type="number" value="1" title="Quantity"
                                                min="1" name="quantity">
                                            <button class="button" type="submit"
                                                onclick="showSuccessToastCart(event)()">Add To
                                                Cart</button>
                                        </div>
                                    </form>

                                    @if (session('username') && session('password'))
                                        <button class="button" onclick="showModalOrder()">Buy Now</button>
                                        <div id="myModalOrder" class="modal">
                                            <div class="modal__main">
                                                <div class="modal__inner">
                                                    <form id="form2" method="POST" action="{{ route('getOrder', ['id' => $id]) }}"
                                                        class="modal__inner-signin modal__inner-signin">
                                                        @csrf
                                                        <div class="form__input--padding">
                                                            <div class="inner__header">
                                                                <h2>Infomation Order</h2>
                                                                <div onclick="offModal()"
                                                                    class="elementor-menu-cart__close-button"></div>
                                                            </div>

                                                            <div class="inner__form">
                                                                <div onclick="enbEffModal()" class="inner__form-row">
                                                                    <input autocomplete="off" type="text"
                                                                        class="form__row form__row-order" title="Full Name"
                                                                        placeholder="" name="fullName" class="phoneInput"
                                                                        required>
                                                                    <span class="form__row-label">First and last name</span>
                                                                </div>

                                                                <div onclick="enbEffModal()" class="inner__form-row">
                                                                    <input autocomplete="off" type="password"
                                                                        class="form__row" title="Phone Number" placeholder=""
                                                                        name="phoneNumber" class="passwordInput" required>
                                                                    <span class="form__row-label">Phone Number</span>
                                                                </div>

                                                                <div onclick="enbEffModal()" class="inner__form-row">
                                                                    <input autocomplete="off" type="text"
                                                                        class="form__row" title="Address"
                                                                        placeholder="" class="verificationInput" name="address" required>
                                                                    <span class="form__row-label">Delivery address</span>
                                                                </div>

                                                                <div onclick="enbEffModal()" class="inner__form-row">
                                                                    <input autocomplete="off" type="text"
                                                                        class="form__row" title="City"
                                                                        placeholder="" class="verificationInput" name="city" required>
                                                                    <span class="form__row-label">City</span>
                                                                </div>

                                                                <div onclick="enbEffModal()" class="inner__form-row">
                                                                    <input autocomplete="off" type="text"
                                                                        class="form__row" title="District"
                                                                        placeholder="" class="verificationInput" name="district" required>
                                                                    <span class="form__row-label">District</span>
                                                                </div>

                                                                <div onclick="enbEffModal()" class="inner__form-row">
                                                                    <input name="paymentMethod" autocomplete="off" type="text" class="form__row verificationInput form__row--focus" title="Select a payment method" placeholder="" required>
                                                                    <span class="form__row-label">Select a payment method</span>
                                                                    <div class="form__row verificationInput payment__option" name="paymentMethod" id="paymentMethodSelect">
                                                                        <option class="option__padding" value="Online Payment">Online Payment</option>
                                                                        <option class="option__padding" value="Payment on delivery (COD)">Payment on delivery (COD)</option>
                                                                    </div>

                                                                    <script src="{{asset('js/a.js')}}"></script>
                                                                </div>

                                                                <div onclick="enbEffModal()" class="inner__form-row">
                                                                    {{-- <input autocomplete="off" type="text"
                                                                        class="form__row" title="Verification"
                                                                        placeholder="" class="verificationInput" required> --}}
                                                                    <textarea class="form__row" title="Description" placeholder="" class="verificationInput" name="message" required></textarea>
                                                                    <span class="form__row-label">Message</span>
                                                                </div>
                                                            </div>

                                                            <div class="inner__terms">
                                                                By signup, you agree to ProTech's <a
                                                                    class="inner__terms-link" href="##">Terms of
                                                                    Service</a> & <a class="inner__terms-link"
                                                                    href="###">Privacy Policy</a>
                                                            </div>

                                                            <div class="inner__btn inner__btn-height">
                                                                <div onclick="offModal()"
                                                                    class="inner__btn-main inner__btn-back"
                                                                    style="cursor: pointer">
                                                                    Back
                                                                </div>
                                                                <!--up-->
                                                                <button ondblclick="showToast()"
                                                                    onclick="validateInputsAndSubmit();" type="submit"
                                                                    class="inner__btn-main inner__btn-signup">Order</button>
                                                                <!--up-->
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <script src="{{asset('js/a.js')}}"></script>
                                                    
                                                    <script>
                                                        // Lắng nghe sự kiện submit của form thứ hai
                                                        document.getElementById("form2").addEventListener("submit", function(event) {
                                                            // Lấy giá trị của trường input trong form đầu tiên
                                                            var quantityValue = document.getElementById("quantityInput").value;
                                                    
                                                            // Đặt giá trị vào trường input trong form thứ hai
                                                            var hiddenInput = document.createElement("input");
                                                            hiddenInput.setAttribute("type", "hidden");
                                                            hiddenInput.setAttribute("name", "quantity");
                                                            hiddenInput.setAttribute("value", quantityValue);
                                                            document.getElementById("form2").appendChild(hiddenInput);
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <!-- backModal() -->
                                            <div onclick="offModal()" class="modal__overlay"></div>
                                        </div>
                                        <!-- end modal -->
                                    @else
                                        <button class="button" onclick="rqSignIn()">Buy Now</button>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                    <button onclick="updating()" type="submit" class="elementor-button elementor-size-sm">
                        <i class="fa-regular fa-bell"></i>
                        Sign up for installment purchase
                    </button>
                </div>
            </div>


            <!-- product product display by category -->
            <div class="similar__pro">
                <div class="similar__pro-title detail__product-title">
                    SIMILAR PRODUCT
                </div>

                <div class="element__product">
                    {{-- <a href="###" class="list__product">
                        <span class="inner__text">-14%</span>
                        <span class="excerpt">Refund 1,000,000 VND</span>
                        <div class="element__product-info">
                            <div class="element__product-info--img">
                                <img src="{{ asset('images/laptop.png') }}" alt="" class="element__product-img">
                            </div>
                            <div class="element__product-title">
                                Laptop Gaming MSI Cyborg 15 A12VE 240VN Geforce RTX…
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
                                <div class="element__product-costs--new">{{ number_format($product->cost, 0, ',', ',') }}
                                    <u>đ</u>
                                </div>
                            </div>
                        </div>

                        <div class="element__product-details">
                            <div>
                                <img src="{{ asset('images/cpu.png') }}" alt="">
                                <span>i5 13500HX</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/vga.png') }}" alt="">
                                <span>RTX 4060</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/ram.png') }}" alt="">
                                <span>DDR5 16GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/storage.png') }}" alt="">
                                <span>512GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/baohanh.png') }}" alt="">
                                <span>12 months 3s1</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/screen.png') }}" alt="">
                                <span>16" 2K+ 165Hz</span>
                            </div>
                        </div>
                    </a>

                    <a href="###" class="list__product">
                        <span class="inner__text">-12%</span>
                        <div class="element__product-info">
                            <div class="element__product-info--img">
                                <img src="{{ asset('images/laptop2.png') }}" alt=""
                                    class="element__product-img">
                            </div>
                            <div class="element__product-title">
                                Laptop Gaming MSI Cyborg 15 A12VE 240VN Geforce RTX…
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
                                <div class="element__product-costs--new">26,890,000 <u>đ</u></div>
                            </div>
                        </div>

                        <div class="element__product-details">
                            <div>
                                <img src="{{ asset('images/cpu.png') }}" alt="">
                                <span>i5 13500HX</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/vga.png') }}" alt="">
                                <span>RTX 4060</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/ram.png') }}" alt="">
                                <span>DDR5 16GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/storage.png') }}" alt="">
                                <span>512GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/baohanh.png') }}" alt="">
                                <span>12 months 3s1</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/screen.png') }}" alt="">
                                <span>16" 2K+ 165Hz</span>
                            </div>
                        </div>
                    </a>

                    <a href="###" class="list__product">
                        <span class="excerpt">FREE 8GB DDR5 RAM</span>
                        <div class="element__product-info">
                            <div class="element__product-info--img">
                                <img src="{{ asset('images/laptop3.png') }}" alt=""
                                    class="element__product-img">
                            </div>
                            <div class="element__product-title">
                                Laptop Gaming MSI Cyborg 15 A12VE 240VN Geforce RTX…
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
                                <div class="element__product-costs--new">26,890,000 <u>đ</u></div>
                            </div>
                        </div>

                        <div class="element__product-details">
                            <div>
                                <img src="{{ asset('images/cpu.png') }}" alt="">
                                <span>i5 13500HX</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/vga.png') }}" alt="">
                                <span>RTX 4060</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/ram.png') }}" alt="">
                                <span>DDR5 16GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/storage.png') }}" alt="">
                                <span>512GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/baohanh.png') }}" alt="">
                                <span>12 months 3s1</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/screen.png') }}" alt="">
                                <span>16" 2K+ 165Hz</span>
                            </div>
                        </div>
                    </a>

                    <a href="###" class="list__product">
                        <span class="excerpt">Free 8GB RAM</span>
                        <span class="inner__text">-14%</span>
                        <div class="element__product-info">
                            <div class="element__product-info--img">
                                <img src="{{ asset('images/laptop.png') }}" alt="" class="element__product-img">
                            </div>
                            <div class="element__product-title">
                                Laptop Gaming MSI Cyborg 15 A12VE 240VN Geforce RTX…
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
                                <div class="element__product-costs--new">26,890,000 <u>đ</u></div>
                            </div>
                        </div>

                        <div class="element__product-details">
                            <div>
                                <img src="{{ asset('images/cpu.png') }}" alt="">
                                <span>i5 13500HX</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/vga.png') }}" alt="">
                                <span>RTX 4060</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/ram.png') }}" alt="">
                                <span>DDR5 16GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/storage.png') }}" alt="">
                                <span>512GB</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/baohanh.png') }}" alt="">
                                <span>12 months 3s1</span>
                            </div>

                            <div>
                                <img src="{{ asset('images/screen.png') }}" alt="">
                                <span>16" 2K+ 165Hz</span>
                            </div>
                        </div>
                    </a> --}}
                    @php
                        $counter = 0;
                    @endphp
                    @foreach ($products as $product)
                        @if ($counter < 4)
                            <a href="{{ route('details', [$product->id, str_replace('/', '-', $product->name)]) }}"
                                class="list__product">
                                @if ($product->cost_old - $product->cost < 1000000)
                                    <span class="excerpt">FREE 8GB DDR5 RAM</span>
                                @elseif ($product->cost_old - $product->cost > 1000000 && $product->cost_old - $product->cost < 3000000)
                                    <span class="excerpt">Refund 1,000,000 VND</span>
                                @elseif ($product->cost_old - $product->cost > 3000000 && $product->cost_old - $product->cost < 4000000)
                                    <span class="excerpt">VOUCHER 1.000.000 VNĐ</span>
                                @else
                                    {{-- <span class="excerpt"></span> --}}
                                @endif

                                <span class="inner__text">
                                    -{{ number_format((($product->cost_old - $product->cost) / $product->cost_old) * 100, 0) }}%
                                </span>

                                <div class="element__product-info">
                                    <div class="element__product-info--img">
                                        <img src="{{ asset('images/' . $product->image) }}" alt=""
                                            class="element__product-img">
                                    </div>
                                    <div class="element__product-title">
                                        {{ Str::limit($product->name, $limit = 51, $end = '...') }}
                                    </div>

                                    <div class="star-rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </div>

                                    <div class="element__product-costs">
                                        <del class="element__product-costs--old">{{ number_format($product->cost_old, 0, ',', ',') }}
                                            <u>đ</u></del>
                                        <div class="element__product-costs--new">
                                            {{ number_format($product->cost, 0, ',', ',') }}
                                            <u>đ</u>
                                        </div>
                                    </div>
                                </div>

                                <div class="element__product-details">
                                    <div>
                                        <img src="{{ asset('images/cpu.png') }}" alt="">
                                        <span>{{ $product->cpu }}</span>
                                    </div>

                                    <div>
                                        <img src="{{ asset('images/vga.png') }}" alt="">
                                        <span>{{ $product->gpu }}</span>
                                    </div>

                                    <div>
                                        <img src="{{ asset('images/ram.png') }}" alt="">
                                        <span>{{ $product->ram }}</span>
                                    </div>

                                    <div>
                                        <img src="{{ asset('images/storage.png') }}" alt="">
                                        <span>{{ $product->storage }}</span>
                                    </div>

                                    <div>
                                        <img src="{{ asset('images/baohanh.png') }}" alt="">
                                        <span>{{ $product->warranty_period }}</span>
                                    </div>

                                    <div>
                                        <img src="{{ asset('images/screen.png') }}" alt="">
                                        <span>{{ $product->screen_size }}</span>
                                    </div>
                                </div>
                            </a>
                            @php
                                $counter++;
                            @endphp
                        @endif
                    @endforeach
                </div>

                <div class="view__all-products">
                    <a href="$$" class="view__all-products-link">
                        <i class="far fa-eye fa-bounce "></i>
                        <span> View all products >></span>
                    </a>
                </div>
            </div>

            <div class="details__spec">
                <div class="details__spec-pro">
                    <div class="details__spec-pro--padding">
                        <div class="details__spec-pro-title">
                            Specifications
                        </div>

                        <table border="1">
                            <tr>
                                <td>CPU</td>
                                <td>Intel® Core™ i5-13500HX</td>
                            </tr>

                            <tr>
                                <td>GPU</td>
                                <td>NVIDIA® GeForce RTX™ 4060 with 8GB of dedicated GDDR6 VRAM</td>
                            </tr>

                            <tr>
                                <td>RAM</td>
                                <td>16GB (2 x 8GB) DDR5 4800MHz (2 khe rời – nâng cấp tối đa 32GB)</td>
                            </tr>

                            <tr>
                                <td>SSD</td>
                                <td>512GB PCIe NVMe SED SSD (2 khe SSD – nâng cấp tối đa 2TB)</td>
                            </tr>

                            <tr>
                                <td>SCREEN</td>
                                <td>16″ WQXGA (2560×1600) – 165Hz – sRGB 100% – 500 nits</td>
                            </tr>

                            <tr>
                                <td>OS</td>
                                <td>Windows 11 64 Bit</td>
                            </tr>

                            <tr>
                                <td>CONNECTOR</td>
                                <td>LAN: Intel® Killer™ E2600 Ethernet <br>Wireless LAN: Intel® Killer™ Wi-Fi 6 AX1650 +
                                    Bluetooth® 5.2 <br>
                                    2xUSB Type-C™ port supporting: • USB 3.2 Gen 2 (up to 10 Gbps)• DisplayPort over
                                    USB-C• Thunderbolt™ 4• USB charging 5 V; 3 A• DC-in port 20 V; 65W – 3xUSB
                                    Standard-A ports, supporting: • One port for USB 3.2 Gen 1 • One port for USB 3.2
                                    Gen 2 • One port for USB 3.2 Gen 2 featuring power off USB charging – 1xMicroSD™
                                    Card reader – 1xHDMI® 2.1 port with HDCP support – 1×3.5 mm headphone/speaker jack,
                                    supporting headsets with built-in microphone – 1xEthernet (RJ-45) port – 1xDC-in
                                    jack for AC adapter
                                </td>
                            </tr>

                            <tr>
                                <td>KEYBORAD</td>
                                <td>RGB 4 zone</td>
                            </tr>

                            <tr>
                                <td>PIN</td>
                                <td>90 Wh 4-cell Li-ion battery</td>
                            </tr>

                            <tr>
                                <td>WEIGHT</td>
                                <td>2.6 kg</td>
                            </tr>

                            <tr>
                                <td>SIZE</td>
                                <td>360.1 (W) x 279.9 (D) x 26.55/28.25 (H) mm</td>
                            </tr>

                            <tr>
                                <td>GUARANTEE</td>
                                <td>12 months Genuine 3S1</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="details__spec-des">
                    <div class="details__spec-pro--padding">
                        <div class="spec-des__top">
                            <div class="details__spec-pro-title">
                                Special Characteristics
                            </div>

                            <div class="spec__pro-tab">
                                <a href="##">Description</a>
                                <a href="##">Reviews (0)</a>
                            </div>
                        </div>
                        @php
                            $countDes = 0;
                        @endphp
                        <div class="spec-des__bottom">
                            <h1>Description</h1>
                            @foreach ($products as $product)
                                @foreach ($images as $image)
                                    @if ($product->id == $id)
                                        @if ($image->id_product && $image->id_product == $id)
                                            <h2 style="text-transform: uppercase;">
                                                {{ $image->fileName }}
                                            </h2>
                                            @php
                                                $filePath = json_decode($image->filePath, true);
                                                $imgDes = $filePath[1];
                                                // $imgNav = $filePath[0];
                                            @endphp
                                            <!--1 start -->
                                            <img src="{{ asset('images/' . $imgDes) }}" alt="">
                                            <p style="text-align: center; margin-bottom: 10px;">
                                                <span
                                                    style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                                    {{ $image->description }}
                                                </span>
                                            </p>
                                            @php
                                                $countDes++;
                                            @endphp
                                            {{-- @elseif (!$image->id_product || $image->id_product != $id)
                                            
                                            @php
                                                $countDes ++;
                                            @endphp --}}
                                            <!-- end -->
                                            {{-- @break --}}
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach

                            @if ($countDes === 0)
                                <h2 style="text-transform: uppercase;">
                                    MIXED WITH THE BEST
                                </h2>
                                <!--2 start -->
                                <img src="{{ asset('images/info-lap.png') }}" alt="">
                                <h2 style="text-transform: uppercase;">
                                    MIXED WITH THE BEST
                                </h2>
                                <p style="text-align: center; margin-bottom: 10px;">
                                    <span
                                        style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                        The perfect gaming experience with the all-new Acer Predator Helios Neo
                                        16
                                        PHN16-71-59TN 2023.
                                        The ultra-fast 16″ WQXGA 240Hz display puts victory in your hands and
                                        kills
                                        your
                                        opponents with ease.
                                        Equipped with NVIDIA® GeForce RTX™ 4060 graphics, 13th Gen Intel® Core™
                                        i5,
                                        and
                                        exclusive 5th Gen AeroBlade™
                                        3D Technology.
                                    </span>
                                </p>
                                <!--3 start -->
                                <img src="{{ asset('images/info-lap.png') }}" alt="">
                                <h2>
                                    PERFORMANCE EXPLOSION
                                </h2>
                                <p style="text-align: center; margin-bottom: 10px;">
                                    <span
                                        style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                        Acer Predator Helios Neo 16 PHN16-71-59TN is powered by a 13th
                                        generation Intel®
                                        Core™ i5 processor that delivers
                                        blazing fast processing speeds with high clock speeds. Combined with the
                                        built-in
                                        super-speed 16GB DDR5 Ram for
                                        the purpose of optimizing the user's usage process, it always happens
                                        smoothly even
                                        when opening many tasks at
                                        the same time.
                                    </span>
                                </p>
                                <!-- end -->

                                <!--4 start -->
                                <img src="{{ asset('images/info-lap.png') }}" alt="">
                                <h2>
                                    NVIDIA® GEFORCE RTX™ 40 SERIES
                                </h2>
                                <p style="text-align: center; margin-bottom: 10px;">
                                    <span
                                        style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                        Acer Predator Helios Neo 16 PHN16-71-59TN features an RTX 40 Series GPU
                                        that
                                        delivers ultimate
                                        performance for gamers and creators. Powered by NVIDIA's 3rd generation
                                        RTX Ampere
                                        architecture –
                                        with new Ray Tracing Cores, Tensor Cores, and streaming multiprocessors
                                        for a
                                        performance leap.
                                    </span>
                                </p>
                                <!-- end -->


                                <!--5 start -->
                                <img src="{{ asset('images/info-lap.png') }}" alt="">
                                <h2>
                                    AMAZING PHOTO
                                </h2>
                                <p style="text-align: center; margin-bottom: 10px;">
                                    <span
                                        style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                        Lock your eyes on the Acer Predator Helios Neo 16 PHN16-71-59TN monitor.
                                        Measuring
                                        16 inches with a
                                        16:10 aspect ratio and 165Hz refresh rate, the WQXGA1 panel works at
                                        full power and
                                        includes NVIDIA®
                                        G-SYNC® and Advanced Optimus for maximum graphics power.
                                    </span>
                                </p>
                            @endif
                            <!-- end -->

                            <!--3 start -->
                            {{-- <img src="{{ asset('images/info-lap.png') }}" alt="">
                            <h2>
                                PERFORMANCE EXPLOSION
                            </h2>
                            <p style="text-align: center; margin-bottom: 10px;">
                                <span
                                    style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                    Acer Predator Helios Neo 16 PHN16-71-59TN is powered by a 13th generation Intel®
                                    Core™ i5 processor that delivers
                                    blazing fast processing speeds with high clock speeds. Combined with the built-in
                                    super-speed 16GB DDR5 Ram for
                                    the purpose of optimizing the user's usage process, it always happens smoothly even
                                    when opening many tasks at
                                    the same time.
                                </span>
                            </p> --}}
                            <!-- end -->

                            <!--4 start -->
                            {{-- <img src="{{ asset('images/info-lap.png') }}" alt="">
                            <h2>
                                NVIDIA® GEFORCE RTX™ 40 SERIES
                            </h2>
                            <p style="text-align: center; margin-bottom: 10px;">
                                <span
                                    style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                    Acer Predator Helios Neo 16 PHN16-71-59TN features an RTX 40 Series GPU that
                                    delivers ultimate
                                    performance for gamers and creators. Powered by NVIDIA's 3rd generation RTX Ampere
                                    architecture –
                                    with new Ray Tracing Cores, Tensor Cores, and streaming multiprocessors for a
                                    performance leap.
                                </span>
                            </p> --}}
                            <!-- end -->


                            <!--5 start -->
                            {{-- <img src="{{ asset('images/info-lap.png') }}" alt="">
                            <h2>
                                AMAZING PHOTO
                            </h2>
                            <p style="text-align: center; margin-bottom: 10px;">
                                <span
                                    style="font-size: 16px; color: #000000; font-family: tahoma, arial, helvetica, sans-serif;">
                                    Lock your eyes on the Acer Predator Helios Neo 16 PHN16-71-59TN monitor. Measuring
                                    16 inches with a
                                    16:10 aspect ratio and 165Hz refresh rate, the WQXGA1 panel works at full power and
                                    includes NVIDIA®
                                    G-SYNC® and Advanced Optimus for maximum graphics power.
                                </span>
                            </p> --}}
                            <!-- end -->
                        </div>
                    </div>
                </div>
            </div>





            <!-- comment -->
            <div class="comment">
                <div class="comment__p">
                    <div class="comment-qtt">
                        <span>0</span>
                        <span>comments</span>
                    </div>
                    <div class="comment-sort">
                        Sort by <span>Oldest <i class="fa-solid fa-up-down fa-rotate-180 fa-2xs"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
