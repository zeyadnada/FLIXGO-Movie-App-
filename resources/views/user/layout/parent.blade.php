<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="/css/nouislider.min.css">
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/plyr.css">
    <link rel="stylesheet" href="/css/photoswipe.css">
    <link rel="stylesheet" href="/css/default-skin.css">
    <link rel="stylesheet" href="/css/main.css">
    @yield('css')

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="/icon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-touch-icon-144x144.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>@yield('title')</title>

    @livewireStyles

</head>

<body class="body">

    <!-- header -->
    <header class="header">
        <div class="header__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header__content">
                            <!-- header logo -->
                            <a href="{{ route('movies.index') }}" class="header__logo">
                                <img src="/img/logo.svg" alt="">
                            </a>
                            <!-- end header logo -->

                            <!-- header nav -->
                            <ul class="header__nav">

                                <!-- movies -->
                                <li class="header__nav-item">
                                    <a href="{{ route('movies.index') }}" class="header__nav-link">Movies</a>
                                </li>
                                <!-- end movies -->

                                <!-- TV -->
                                <li class="header__nav-item">
                                    <a href="{{ route('tvShows.index') }}" class="header__nav-link">TV Shows</a>
                                </li>
                                <!-- end TV -->

                                <li class="header__nav-item">
                                    <a href="{{ route('actors.index') }}" class="header__nav-link">Actors</a>
                                </li>

                                <li class="header__nav-item">
                                    <a href="faq.html" class="header__nav-link">Help</a>
                                </li>

                                <!-- dropdown -->
                                <li class="dropdown header__nav-item">
                                    <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#"
                                        role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="icon ion-ios-more"></i></a>

                                    <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="signin.html">Sign In</a></li>
                                        <li><a href="signup.html">Sign Up</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <!-- end dropdown -->
                            </ul>
                            <!-- end header nav -->

                            <!-- header auth -->
                            <div class="header__auth">
                                <a class="header__search-btn" href="#" id="toggleSearch">
                                    <i class="icon ion-ios-search"></i>
                                </a>

                                <a href="signin.html" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>sign in</span>
                                </a>
                            </div>
                            <!-- end header auth -->

                            <!-- header menu btn -->
                            <button class="header__btn" type="button">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- end header menu btn -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header search -->
        <livewire:search-dropdown />
        <!-- end header search -->
    </header>
    <!-- end header -->

    @yield('content')

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- footer list -->
                <div class="col-12 col-md-3">
                    <h6 class="footer__title">Download Our App</h6>
                    <ul class="footer__app">
                        <li><a href="#"><img src="/img/Download_on_the_App_Store_Badge.svg" alt=""></a>
                        </li>
                        <li><a href="#"><img src="/img/google-play-badge.png" alt=""></a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer list -->
                <div class="col-6 col-sm-4 col-md-3">
                    <h6 class="footer__title">Resources</h6>
                    <ul class="footer__list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Pricing Plan</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer list -->
                <div class="col-6 col-sm-4 col-md-3">
                    <h6 class="footer__title">Legal</h6>
                    <ul class="footer__list">
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer list -->
                <div class="col-12 col-sm-4 col-md-3">
                    <h6 class="footer__title">Contact</h6>
                    <ul class="footer__list">
                        <li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
                        <li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
                    </ul>
                    <ul class="footer__social">
                        <li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                        <li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                        <li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                        <li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer copyright -->
                <div class="col-12">
                    <div class="footer__copyright">
                        <small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>

                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end footer copyright -->
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- JS -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.mousewheel.min.js"></script>
    <script src="/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="/js/wNumb.js"></script>
    <script src="/js/nouislider.min.js"></script>
    <script src="/js/plyr.min.js"></script>
    <script src="/js/jquery.morelines.min.js"></script>
    <script src="/js/photoswipe.min.js"></script>
    <script src="/js/photoswipe-ui-default.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSearch');
        const searchBox = document.getElementById('searchBox');

        // Toggle function
        toggleBtn.addEventListener('click', function() {
            searchBox.classList.toggle('show-search-box');
        });
    </script>
    @yield('js')

    @livewireScripts

</body>

</html>
