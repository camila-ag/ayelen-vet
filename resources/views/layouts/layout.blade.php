<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    @yield('title')

    <!-- STYLES -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="icon" type="image/jpg" href="{{asset('img/favicon.ico')}}" />
    
    <!-- SCRIPTS -->
    <script src="https://kit.fontawesome.com/d51903633f.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</head>
<body class="sb-nav-fixed" style="background-color: rgb(66, 19, 101) ">
    <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #e0e0e0;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{route('home')}}">
            <img src="{{ asset('img/Logo.png') }}" alt="" width="50" height="40" class="ms-4 d-lg-none">
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        
        <!-- Navbar-->
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user fa-fw cl-purple"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-custom" id="sidenavAccordion">
                <a href="{{route('home')}}">
                    <img src="{{ asset('img/Logo.png') }}" alt="" width="100" height="80" class="ms-5 d-none d-lg-block">
                </a>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Pacientes</div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Nuevo paciente
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('pacientes.create') }}">Propietario nuevo</a>
                                <a class="nav-link" href="{{ route('pacientes.existente') }}">Propietario existente</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ route('pacientes.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-paw"></i></div>
                            Ver pacientes
                        </a>
                        <div class="sb-sidenav-menu-heading">Consulta</div>
                        <a class="nav-link" href="{{ route('consultas.create') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Agendar consulta
                        </a>
                        <a class="nav-link" href="{{route('consultas.index')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-stethoscope"></i></div>
                            Revisar consultas
                        </a>

                        <div class="sb-sidenav-menu-heading">Cirugías</div>
                        <a class="nav-link" href="{{ route('cirugias.create') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Agendar cirugía
                        </a>
                        <a class="nav-link" href="{{route('cirugias.index')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                            Revisar cirugías
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer" style="color: #b71c1c;">
                    <div class="small">Iniciaste sesión como:</div>
                    <!--NOMBRE USUARIO-->
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- CONTENT -->
                    @yield('content')
                </div>
            </main>
            
        </div>
    </div>

    <!-- ICONOS -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <!-- FIN ICONOS -->
</body>
</html>