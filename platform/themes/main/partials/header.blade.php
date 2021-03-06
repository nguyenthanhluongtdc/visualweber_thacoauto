<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="{{ app()->getLocale() }}"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="{{ app()->getLocale() }}"><![endif]-->
<!--[if IE 9]><html class="ie ie9" lang="{{ app()->getLocale() }}"><![endif]-->
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1"
        name="viewport" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="theme-color" content="#01498b">
    <link rel="manifest" href="{{Theme::asset()->url('manifest/manifest.json')}}">
    <!-- Fonts-->
    {{-- <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Roboto')) }}"
        rel="stylesheet" type="text/css"> --}}
    <!-- CSS Library-->

    <style>
        :root {
            --color-1st: {{ theme_option('primary_color', '#01498b') }}

            ;
            /* --primary-font: '{{ theme_option('primary_font', 'Roboto') }}', */
            /* sans-serif; */
        }
    </style>

    {!! Theme::header() !!}

    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body @if (BaseHelper::siteLanguageDirection()=='rtl' ) dir="rtl" class="MyriadPro-Regular font15" @endif>
    {!! apply_filters(THEME_FRONT_BODY, null) !!}
    <header class="header header-desktop" id="header">
        <div class="header-wrap container-remake">
            <div class="logo">
                <a href="{{ route('public.single') }}" class="page-logo d-flex">
                    @if (theme_option('logo'))
                    <img loading="lazy" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}"
                        height="17">
                    @endif
                </a>
            </div>
            <div class="main-menu">

                {!! Menu::renderMenuLocation('main-menu', [
                'options' => ['class' => 'menu sub-menu--slideLeft'],
                'view' => 'main-menu',
                ]) !!}

            </div>

            @php
                $supportedLocales = array_reverse(Language::getSupportedLocales()) ;
                $showRelated = setting('language_show_default_item_if_current_version_not_existed', true);
                $currentLanguage = Language::getCurrentLocale();
                // $currentLocate = Arr::get($supportedLocales, Language::getCurrentLocale(), []);
            @endphp
            <div class="search-language">
                <div class="search">
                    <a aria-label="Search" href="#search"><img loading="lazy" src="{{ Theme::asset()->url('images/main/search.png') }}" alt="Search"></a>
                </div>
                <div class="language">
                    <ul class="nav-lang">
                        @foreach($supportedLocales as $name => $language)
                        <li class="nav-item lang-vi text-uppercase {{$name==$currentLanguage?'active':''}}">
                            <a class="nav-link font-pri-bold font18" rel="alternate" hreflang="{{$name}}"
                                href="{{$showRelated ? Language::getLocalizedURL($name) : url($name)}}">
                                {!! $name !!}
                            </a>
                        </li>
                        @endforeach
                        {{-- <li class="nav-item lang-en">
                            <a class="nav-link font-pri-bold font18" rel="alternate" hreflang="en"
                                href="{{ Language::getLocalizedURL('en') }}">EN</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div id="search-box" class="form-search">
                <div class="container">
                <a class="close" href="#close"></a>
                <div class="search-main">
                    <div class="search-inner">
                    <form action="{{route('public.search')}}">
                        <input autocomplete="off" class="font17 search-bar" type="text" input-id="1" id="inputSearch" name="keyword" placeholder="" value="{{ request()->get('keyword') }}">
                        <span class="search-info font16">{{__('Hit enter to search or ESC to close')}}</span>
                    </form>
                  
                    <div class="box-popover-1 popover-search">
                       
                    </div>
                </div>
              </div>
            </div>
        </div>
    </header>

    <div id="mobileNav">
        <div class="container-remake h-100 font-18">
            <div class="menu-main">
                <div class="logo">
                    <a href="{{ route('public.single') }}" class="page-logo">
                        @if (theme_option('logo'))
                        <img loading="lazy" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                            alt="{{ theme_option('site_title') }}" height="17">
                        @endif
                    </a>
                </div>

                <div class="zeynep-open">
                    <input type="checkbox" id="top-nav" />
                    <div class="icon-menu">
                        <span class="hamburgerspan"></span>
                        <span class="hamburgerspan"></span>
                        <span class="hamburgerspan"></span>
                    </div>
                </div>
                <div class="zeynep">
                    <div class="box-search-mobile">
                        <form action="{{route('public.search')}}" method="GET">
                            <input type="text" placeholder="{!! __('T??m ki???m') !!}"
                            name="keyword" value="{{ request()->get('keyword') }}">
                            <button type="submit">  <ion-icon name="search-outline" class="font25"></ion-icon> </button>
                        </form>
                    </div>

                    {!!
                        Menu::renderMenuLocation('main-menu', [
                            'view' => 'menu-mobile',
                        ])
                    !!}

                    <div class="nav-lang-mobile d-flex">
                        @foreach($supportedLocales as $name => $language)
                        <span class="nav-item-mobile lang-vi text-uppercase {{$name==$currentLanguage?'active':''}}">
                            <a class="nav-link-mobile font-pri-bold font18" rel="alternate" hreflang="{{$name}}"
                                href="{{$showRelated ? Language::getLocalizedURL($name) : url($name)}}">
                                {!! $name !!}
                            </a>
                        </span>
                        @endforeach
                    </div>
                </div>
                <div class="zeynep-overlay"></div>
            </div>
        </div>
    </div>

    <script>
        window.URL_SEARCH = "{{route('public.api.search')}}";
    </script>

    <div id="row__empty"></div>
    <div id="page-wrap">