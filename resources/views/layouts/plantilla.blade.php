<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/searchAnime.css')}}" type="text/css">
</head>

<body>
    <style>
        .dropdown:hover > .dropdown-menu {
        display: block;
    }
    .dropdown > .dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }
    </style>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container" style="height: 62px">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                    <a href="{{route('home')}}">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li @if(\Route::current()->getName() == 'home') class="active" @endif ><a href="{{route('home')}}">Inicio</a></li>
                                <li @if(\Route::current()->getName() == 'catalogo') class="active" @endif ><a href="{{route('catalogo')}}">Animes</a></li>
                                <li><a href="#">Contáctanos</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header__right">
                       <ul class="d-flex justify-content-end">
                            <input type="search" class="d-none form-control" placeholder="Buscar..." id="buscador" style="width: 200px">
                            <a href="#" class="btnSearch ml-3 mr-5" id="btnSearch"><span class="icon_search"></span></a>
                            {{-- href="{{route('login.view')}}" --}}
                            @guest <a href="#myModal" data-toggle="modal"><span class="icon_profile"></span></a> @endguest
                            @auth  <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-item text-dark">Perfil</li>
                                <li><a class="dropdown-item text-dark" href="{{route('admin.index')}}">Administración</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item text-dark" href="{{route('logout')}}">Cerrar Sesion</a></li>
                              
                                {{-- <li><a class="dropdown-item text-dark" href="#">Another action</a></li>
                                <li><a class="dropdown-item text-dark" href="#">Something else here</a></li> --}}
                            </ul>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    @if(session('new_user'))
        <div class="alert alert-success">
            {{ session('new_user') }}
        </div>
    @endif
    <!-- Header End -->
    <!----Contenido--->
    @yield('main')
    <!-----Fin Contendi.--->
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="./index.html">Homepage</a></li>
                            <li><a href="./categories.html">Categories</a></li>
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- MODAL LOGIN -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar d-flex justify-content-center align-items-center">
                        <span class="fas fa-user fa-4x" alt="Avatar"></span>
                    </div>				
                    <h4 class="modal-title text-white">Iniciar Sesión</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group mb-4 mt-1 input__item">
                            <label class="text-white">Email</label>
                            <input type="text" class="{{ $errors->has('email') ? ' has-error' : '' }} has-feedback form-control" name="email" placeholder="Email" required="required">	
                            @if ($errors->has('email')) <strong class="text-danger">{{ $errors->first('email') }}</strong> @endif	
                        </div>
                        <div class="form-group mb-5 mt-1 input__item">
                            <label class="text-white">Contraseña</label>
                            <input type="password" class="{{ $errors->has('contraseña') ? ' has-error' : '' }} has-feedback form-control" name="contraseña" placeholder="Contraseña" required="required">	
                            @if ($errors->has('contraseña')) <strong class="text-danger">{{ $errors->first('contraseña') }}</strong> @endif
                        </div>        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn site-btn">Ingresar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-5">
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="col-sm-2">
                            <div class="vl" style="border-left: 1px solid rgb(255, 255, 255); height: 100%; top: 0; position: absolute; left: 50%; margin-left: -3px;"></div>
                        </div>
                        <div class="col-sm-5">
                            <a href="#modalRegistrar" data-toggle="modal" data-dismiss="modal" aria-hidden="true">¿No tienes cuenta? Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL LOGIN -->

    <!-- MODAL REGISTRARSE -->
    <div id="modalRegistrar" class="modal fade">
        <div class="modal-dialog modal-login" style="height: 520px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar d-flex justify-content-center align-items-center">
                        <span class="fas fa-user fa-4x" alt="Avatar"></span>
                    </div>				
                    <h4 class="modal-title text-white">Registrarse</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('registro')}}" method="POST">
                        @csrf
                        <div class="form-group mb-4 mt-1 input__item">
                            <label class="text-white">Email</label>
                            <input type="text" class="{{ $errors->has('email') ? ' has-error' : '' }} has-feedback form-control" name="email" placeholder="Email" required="required">	
                            @if ($errors->has('email')) <strong class="text-danger">{{ $errors->first('email') }}</strong> @endif	
                        </div>
                        <div class="form-group mb-4 mt-1 input__item">
                            <label class="text-white">Nombre</label>
                            <input type="text" class="{{ $errors->has('nombre') ? ' has-error' : '' }} has-feedback form-control" name="nombre" placeholder="Nombre" required="required">	
                            @if ($errors->has('nombre')) <strong class="text-danger">{{ $errors->first('nombre') }}</strong> @endif	
                        </div>
                        <div class="form-group mb-5 mt-1 input__item">
                            <label class="text-white">Contraseña</label>
                            <input type="password" class="{{ $errors->has('contraseña') ? ' has-error' : '' }} has-feedback form-control" name="contraseña" placeholder="Contraseña" required="required">	
                            @if ($errors->has('contraseña')) <strong class="text-danger">{{ $errors->first('contraseña') }}</strong> @endif
                        </div>        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn site-btn">Registrar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-5">
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="col-sm-2">
                            <div class="vl" style="border-left: 1px solid rgb(255, 255, 255); height: 100%; top: 0; position: absolute; left: 50%; margin-left: -3px;"></div>
                        </div>
                        <div class="col-sm-5">
                            <a href="#myModal" data-toggle="modal" data-dismiss="modal" aria-hidden="true">¿Ya tienes cuenta? Inicia sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <!-- FIN MODAL REGISTRARSE -->


    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/player.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#btnSearch').click(function (e) { 
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: "/api/obtenerAnimesIndex",
                    success: function (response) {
                        recibirDatos(response);
                    }
                });

                if($('#buscador').hasClass('d-none')){
                    $('#buscador').removeClass('d-none');
                }else{
                    $('#buscador').addClass('d-none');
                }
            });
        });

        function recibirDatos(data){
            const animesxd = [];
            data.forEach(element => {
                animesxd.push(element.nombre)
            });
            $( "#buscador" ).autocomplete({
                source: animesxd
            });
        }
    </script>
</body>

</html>