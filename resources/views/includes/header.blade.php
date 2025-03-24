<header class="header">
    <div class="container">
        <div class="head">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('img/logo.svg') }}" alt="">
                </a>
            </div>
            <div class="menu">
                <div class="menu__button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-align-justify">
                        <path d="M3 12h18" />
                        <path d="M3 18h18" />
                        <path d="M3 6h18" />
                    </svg>
                </div>
                <div class="menu__content">
                    <div class="close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </div>
                    <div class="menu__content-wrapper">
                        <a href="{{ route('index') }}" class="menu__content-wrapper__a">
                            <div class="img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house">
                                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                    <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                </svg>
                            </div>
                            <div class="text">
                                Главная
                            </div>
                        </a>
                        <a href="{{ route('product.catalog') }}" class="menu__content-wrapper__a">
                            <div class="img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart">
                                    <circle cx="8" cy="21" r="1" />
                                    <circle cx="19" cy="21" r="1" />
                                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                </svg>
                            </div>
                            <div class="text">
                                Каталог
                            </div>
                        </a>
                        @auth
                        @if (auth()->user()->role == 'user')
                        <a href="{{ route('cart.index') }}" class="menu__content-wrapper__a">
                            <div class="img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-basket">
                                    <path d="m15 11-1 9" />
                                    <path d="m19 11-4-7" />
                                    <path d="M2 11h20" />
                                    <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4" />
                                    <path d="M4.5 15.5h15" />
                                    <path d="m5 11 4-7" />
                                    <path d="m9 11 1 9" />
                                </svg>
                            </div>
                            <div class="text">
                                Корзина
                            </div>
                        </a>
                        @endif

                        <a href="{{ route('order.index') }}" class="menu__content-wrapper__a">
                            <div class="img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-ordered">
                                    <path d="M10 12h11" />
                                    <path d="M10 18h11" />
                                    <path d="M10 6h11" />
                                    <path d="M4 10h2" />
                                    <path d="M4 6h1v4" />
                                    <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1" />
                                </svg>
                            </div>
                            <div class="text">
                                Заказы
                            </div>
                        </a>
                        <form action="{{ route('auth.logout') }}" method="post">
                            @csrf
                            <button href="" class="menu__content-wrapper__a">
                                <div class="img">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                        <polyline points="16 17 21 12 16 7" />
                                        <line x1="21" x2="9" y1="12" y2="12" />
                                    </svg>
                                </div>
                                <div class="text">
                                    Выйти
                                </div>
                            </button>
                        </form>
                        @endauth
                        @guest
                        <a href="{{ route('auth.login') }}" class="menu__content-wrapper__a">
                            <div class="img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                    <polyline points="10 17 15 12 10 7" />
                                    <line x1="15" x2="3" y1="12" y2="12" />
                                </svg>
                            </div>
                            <div class="text">
                                Войти
                            </div>
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>