<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Protech | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/designlogo.png') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/a.js') }}"></script>
    <script src="a.js"></script>
    <style>
        .show-cat-btn--pro::before {
            position: absolute;
            content: '';
            height: 22px;
            width: 3px;
            right: -11px;
            border-radius: 10px;
            background-color: #fff;
            opacity: 0;
            -webkit-transition: .3s all;
            -o-transition: .3s all;
            transition: .3s all
        }
    </style>
</head>

<body>

    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="{{ route('dashboard.home') }}" class="logo-wrapper" title="Home">
                        <span class="sr-only">Home</span>
                        {{-- <span class="icon logo" aria-hidden="true"></span> --}}
                        <img style="    width: 70px;" src="{{ asset('images/designlogo.png') }}" style=""
                            aria-hidden="true">
                        <div class="logo-text">
                            <span class="logo-title">Protech</span>
                            <span class="logo-subtitle">Dashboard</span>
                        </div>

                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="" href="{{ url('dashboard') }}"><span class="icon home"
                                    aria-hidden="true"></span>Dashboard</a>
                        </li>
                        <li>

                            {{-- test --}}
                            <a class="" href="{{ route('dashboard') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Products
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('manageCategories') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Categories
                            </a>
                        </li>
                        <li>
                            <a class="active" href="{{ route('manageCarts') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Carts
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{ route('manageBrands') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Brands
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{ route('manageGiftcodes') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Giftcode
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('manageImages') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Images
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('manageOrders') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('manageAccounts') }}">
                                <span class="icon document" aria-hidden="true"></span>
                                Accounts
                            </a>
                        </li>
                        <li>
                            <a href="comments.html">
                                <span class="icon message" aria-hidden="true"></span>
                                Comments
                            </a>
                            <span class="msg-counter">7</span>
                        </li>
                    </ul>
                    <span class="system-menu__title">system</span>
                    <ul class="sidebar-body-menu">
                        <li>
                            <a href="appearance.html"><span class="icon edit"
                                    aria-hidden="true"></span>Appearance</a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon category" aria-hidden="true"></span>Extentions
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="extention-01.html">Extentions-01</a>
                                </li>
                                <li>
                                    <a href="extention-02.html">Extentions-02</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon user-3" aria-hidden="true"></span>Users
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="users-01.html">Users-01</a>
                                </li>
                                <li>
                                    <a href="users-02.html">Users-02</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer">
                <a href="##" class="sidebar-user">
                    @foreach ($accounts as $account)
                        @if ($account->id == 10)
                            <span class="sidebar-user-img">
                                <picture>
                                    <source srcset="{{ asset('images/' . $account->avatar) }}" type="image/webp">
                                    <img src="{{ asset('images/' . $account->avatar) }}" alt="User name">
                                </picture>
                            </span>
                            <div class="sidebar-user-info">
                                <span class="sidebar-user__title">{{ $account->username }}</span>
                                <span class="sidebar-user__subtitle">Support manager</span>
                            </div>
                        @endif
                    @endforeach
                </a>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                        <div class="search-wrapper">
                            <i data-feather="search" aria-hidden="true"></i>
                            <input type="text" placeholder="Enter keywords ..." required>
                        </div>
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>
                        <div class="lang-switcher-wrapper">
                            <button class="lang-switcher transparent-btn" type="button">
                                EN
                                <i data-feather="chevron-down" aria-hidden="true"></i>
                            </button>
                            <ul class="lang-menu dropdown">
                                <li><a href="##">English</a></li>
                                <li><a href="##">French</a></li>
                                <li><a href="##">Uzbek</a></li>
                            </ul>
                        </div>
                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>
                        <div class="notification-wrapper">
                            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                                <span class="sr-only">To messages</span>
                                <span class="icon notification active" aria-hidden="true"></span>
                            </button>
                            <ul class="users-item-dropdown notification-dropdown dropdown">
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">System just updated</span>
                                            <span class="notification-dropdown__subtitle">The system has been
                                                successfully upgraded. Read more
                                                here.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon danger">
                                            <i data-feather="info" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">The cache is full!</span>
                                            <span class="notification-dropdown__subtitle">Unnecessary caches take up a
                                                lot of memory space and
                                                interfere ...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">New Subscriber here!</span>
                                            <span class="notification-dropdown__subtitle">A new subscriber has
                                                subscribed.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="link-to-page" href="##">Go to Notifications page</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn" title="My profile"
                                type="button">
                                <span class="sr-only">My profile</span>
                                <span class="nav-user-img">
                                    @foreach ($accounts as $account)
                                        @if (session('username') == $account->username)
                                            @if ($account->avatar != null)
                                                <picture>
                                                    <source srcset="{{ asset('images/' . $account->avatar) }}"
                                                        type="image/webp">
                                                    <img src="{{ asset('images/' . $account->avatar) }}"
                                                        alt="" title="{{ session('username') }}">
                                                </picture>
                                            @else
                                                <img style="width: 28px; border-radius: 50%;" onclick="showModal()"
                                                    class="fa-solid fa-user btn-user-click"
                                                    src="{{ asset('images/avatarNull.jpg') }}" alt=""
                                                    title="{{ session('username') }}">
                                            @endif
                                        @endif
                                    @endforeach
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li><a href="##">
                                        <i data-feather="user" aria-hidden="true"></i>
                                        <span>Profile</span>
                                    </a></li>
                                <li><a href="##">
                                        <i data-feather="settings" aria-hidden="true"></i>
                                        <span>Account settings</span>
                                    </a></li>
                                <li><a class="danger" href="{{ route('logout') }}">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        <span>Log out</span>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    <h2 class="main-title">Manage Carts</h2>
                    <div class="col-lg-9">

                        <div class="users-table table-wrapper">
                            <table class="posts-table">
                                <thead>
                                    <tr class="users-table-info">
                                        <th>
                                            <label class="users-table__checkbox ms-20">
                                                <a title="Add a cart" style="margin-right: 20px;" class="check-all"
                                                    href="{{ route('add-cart') }}"><i
                                                        class="fa-solid fa-plus"></i></a>
                                                Username
                                            </label>
                                        </th>
                                        <th style="    min-width: 120px;">Created_at</th>
                                        <th style="    min-width: 100px;">Updated_at</th>
                                        <th style="    min-width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>
                                                <label class="users-table__checkbox">
                                                    <div style="margin-right: 27px;" class="check">
                                                        {{ $cart->id }}</div>
                                                    <div class="categories-table-img">
                                                        @if ($cart->id_user == null)
                                                            <i>NULL</i>
                                                        @else
                                                            @foreach ($accounts as $account)
                                                                @if ($cart->id_user == $account->id)
                                                                    {{ $account->username }}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </label>
                                            </td>
                                            <td>
                                                @if ($cart->created_at == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $cart->created_at }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($cart->updated_at == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $cart->updated_at }}
                                                @endif
                                            </td>

                                            <td>
                                                <span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-more-horizontal"
                                                            aria-hidden="true">
                                                            <circle cx="12" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="19" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="5" cy="12" r="1">
                                                            </circle>
                                                        </svg>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a
                                                                href="update-cart/{{ $cart->id }}/{{ str_replace('/', '-', $cart->name) }}">Edit</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('copyCart', [$cart->id, str_replace('/', '-', $cart->name)]) }}">Quick
                                                                Copy</a></li>
                                                        <li><a
                                                                href="{{ route('deleteCart', ['id' => $cart->id]) }}">Trash</a>
                                                        </li>
                                                    </ul>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </main>
            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2023 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank"
                                rel="noopener noreferrer">elegant-dashboard.com</a></p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="##">About</a></li>
                        <li><a href="##">Support</a></li>
                        <li><a href="##">Puchase</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <!-- Chart library -->
    <script src="{{ asset('plugins/chart.min.js') }}"></script>
    <!-- Icons library -->
    <script src="{{ asset('plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('plugins/feather.min.js.map') }}"></script>

    <!-- test audio -->
    <audio id="notificationSound">
        <source src="{{ asset('audio/notify.mp3') }}" type="audio/mpeg">
    </audio>

    <audio id="notificationSound1">
        <source src="{{ asset('audio/notify1.mp3') }}" type="audio/mpeg">
    </audio>

    <audio id="notificationSound2">
        <source src="{{ asset('audio/notify2.mp3') }}" type="audio/mpeg">
    </audio>

    <audio id="notificationSound3">
        <source src="{{ asset('audio/click.mp3') }}" type="audio/mpeg">
    </audio>

    @if (session('username') && session('password'))
        <div id="toast"></div>
        @if (session('showToastLoginSS'))
            <script>
                var username = "{{ session('username') }}";

                toast({
                    title: "Success!",
                    message: "Welcome " + username + " to the world of ProTech!",
                    type: "success",
                    duration: 5000
                });
                notificationSound1.play();

                function showSuccessToast() {
                    toast({
                        title: "Success!",
                        message: "Welcome to the world of ProTech!",
                        type: "success",
                        duration: 5000
                    });
                    notificationSound1.play();
                }

                function showErrorToast() {
                    toast({
                        title: "Error!",
                        message: "An error has occurred, please contact the administrator.",
                        type: "error",
                        duration: 5000
                    });
                    notificationSound1.play();
                }
            </script>
        @endif

    @endif

    <div id="toast"></div>

    {{-- <div>
            <div onclick="showSuccessToast();" class="btn btn--success">Show success toast</div>
            <div onclick="showErrorToast();" class="btn btn--danger">Show error toast</div>
        </div> --}}

    <script>
        function showSuccessToast() {
            toast({
                title: "Success!",
                message: "Welcome to the world of ProTech!",
                type: "success",
                duration: 5000
            });
            notificationSound1.play();
        }

        function showErrorToast() {
            toast({
                title: "Error!",
                message: "An error has occurred, please contact the administrator.",
                type: "error",
                duration: 5000
            });
            notificationSound1.play();
        }
    </script>

    {{-- @endif --}}
    @if (session('showToastAddProSS'))
        <script>
            toast({
                title: "Product Added!",
                message: "You have successfully added a product.",
                type: "success",
                duration: 5000
            });
            notificationSound1.play();
        </script>
    @endif

    @if (session('toastDeleteSS'))
        <script>
            toast({
                title: "Product Deleted!",
                message: "You have successfully deleted a product.",
                type: "success",
                duration: 5000
            });
            notificationSound1.play();
        </script>
    @endif

    @if (session('toastUpdateSS'))
        <script>
            toast({
                title: "Product Updated!",
                message: "You have successfully updated a product.",
                type: "success",
                duration: 5000
            });
            notificationSound1.play();
        </script>
    @endif
</body>

</html>
