<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSS y JS de la plantilla Katniss -->
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('prettify/prettify.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fileupload.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}" type="text/css" />

    <script type="text/javascript" src="{{ asset('prettify/prettify.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-fileupload.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui-1.9.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.autogrow-textarea.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/charCount.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ui.spinner.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.cookie.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Egresados UCM</title>

</head>
<body>
    
    <div id="app" class="mainwrapper">
    
        <!-- START OF LEFT PANEL -->
        <div class="leftpanel">
            
            <div class="logopanel">
                <h1><a href="dashboard.html">Egresados UCM <span>v1.0</span></a></h1>
            </div><!--logopanel-->
            
            <div class="datewidget">Today is Tuesday, Dec 25, 2012 5:30pm</div>
        
            
            <!-- **********************     ESTA ES BARRA DE LA IZQUIERDA VIEEEEJA  ******************* -->
            <div class="leftmenu">        
                <ul class="nav nav-tabs nav-stacked">
                    <li class="nav-header">Main Navigation</li>
                    <li><a class="dropdown-item" href="/usuarios/create"><i class="icon-user"></i>  {{ __('Crear usuarios') }}</a></li>
                    <li><a class="dropdown-item" href="/usuarios"><span class="icon-align-justify"></span>{{ __('Lista de usuarios') }}</a></li>
                    
                </ul>
            </div><!--leftmenu-->
            
        </div><!--mainleft-->
        <!-- END OF LEFT PANEL -->
        
        <!-- START OF RIGHT PANEL -->
        <div class="rightpanel">
            <div class="headerpanel">
                <a href="" class="showmenu"></a>
                
                <div class="headerright">
                    
                    <div class="dropdown userinfo">

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>



                                <ul class="dropdown-menu">
                                    
                
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <span class="icon-off"></span>  {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest

                    </div><!--dropdown-->
                </div><!--headerright-->
            </div><!--headerpanel-->

            @yield('content')
            
        </div><!--mainright-->
        <!-- END OF RIGHT PANEL -->
        
        <div class="clearfix"></div>
        
        <div class="footer">
            <img src="{{asset('footer2.png')}}">
        </div><!--footer-->

        <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">-->
    </div><!--mainwrapper-->

</body>
</html>
