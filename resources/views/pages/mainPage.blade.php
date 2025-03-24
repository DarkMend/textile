@extends('layouts.base')
@section('content')
<section class="slider">
    <div class="container">
        <div class="slider__wrapper">
            <div class="slider__content">
                <div class="slide active">
                    <img src="{{ asset('img/sl1.jpeg') }}" alt="">
                    <h2>Купите хорошие гитары по лучшим ценам</h2>
                    <div class="bg"></div>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/sl2.jpg') }}" alt="">
                    <h2>Скидки всем желающим приобрести новые гитары</h2>
                    <div class="bg"></div>
                </div>
            </div>
            <div class="slider__dots">
                <div class="dot active">
                </div>
                <div class="dot">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our">
    <div class="container">
        <h1 class="page-title">
            О НАС
        </h1>
        <div class="our__wrapper">
            <div class="our__wrapper-img">
                <img src="{{ asset('img/our1.jpg') }}" alt="">
            </div>
            <div class='our__wrapper-text'>
                Более 15 лет мы помогаем музыкантам раскрыть свой творческий потенциал, предоставляя доступ к лучшим гитарам от ведущих мировых производителей. Наш магазин — это не просто место, где можно купить гитару, это пространство, где вас ждут опытные консультанты, готовые поделиться своими знаниями и опытом.
                <br><br>Мы гордимся тем, что можем предложить широкий ассортимент гитар для любых музыкальных стилей и уровней мастерства. От классических акустических инструментов до современных электрогитар с передовыми технологиями, у нас вы найдете все необходимое для воплощения ваших музыкальных идей.
                Мы стремимся к тому, чтобы каждый музыкант, независимо от своего опыта, нашел у нас именно ту гитару, которая станет верным спутником на творческом пути.
            </div>
        </div>
    </div>
</section>
<section class="advantages">
    <div class="container">
        <div class="page-title">
            Наши преимущества
        </div>
        <div class="advetages__wrapper">
            <div class="advetages__wrapper-item">
                <div class="advetages__wrapper-item__img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-audio-lines">
                        <path d="M2 10v3" />
                        <path d="M6 6v11" />
                        <path d="M10 3v18" />
                        <path d="M14 8v7" />
                        <path d="M18 5v13" />
                        <path d="M22 10v3" />
                    </svg>
                </div>
                <div class="advetages__wrapper-item__text">
                    <div class="title">
                        Идеальный звук для каждого
                    </div>
                    <div class="text">
                        Широкий выбор гитар для всех стилей и уровней
                    </div>
                </div>
            </div>
            <div class="advetages__wrapper-item">
                <div class="advetages__wrapper-item__img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                        <path d="M18 21a8 8 0 0 0-16 0" />
                        <circle cx="10" cy="8" r="5" />
                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                    </svg>
                </div>
                <div class="advetages__wrapper-item__text">
                    <div class="title">
                        Экспертные консультации
                    </div>
                    <div class="text">
                        Помощь в выборе гитары от опытных гитаристов
                    </div>
                </div>
            </div>
            <div class="advetages__wrapper-item">
                <div class="advetages__wrapper-item__img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-handshake">
                        <path d="m11 17 2 2a1 1 0 1 0 3-3" />
                        <path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4" />
                        <path d="m21 3 1 11h-2" />
                        <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3" />
                        <path d="M3 4h8" />
                    </svg>
                </div>
                <div class="advetages__wrapper-item__text">
                    <div class="title">
                        Гарантия качества
                    </div>
                    <div class="text">
                        Только проверенные бренды и надежные инструменты
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="map">
    <div class="container">
        <div class="page-title">
            МЫ НА КАРТЕ
        </div>
        <div class="map__wrapper">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A26bc19d84df6da064c6ba1c05891d49c42eaf352d8e86004a10fcb0de173654a&amp;source=constructor" width="100%" height="720" frameborder="0"></iframe>
        </div>
    </div>
</section>
@endsection