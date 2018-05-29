<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('會計管理') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
</head>
<body   style="font-family:Microsoft JhengHei;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/index') }}">
                    <img src="{{ URL::asset('images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                    {{ __('會計管理') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="receiptDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    收據
                                </a>
                                <div class="dropdown-menu" aria-labelledby="receiptDropdown">
                                    <a class="dropdown-item" href="{{ route('index') }}">{{ __('收據列表') }}</a>
                                    <a class="dropdown-item" href="{{ route('retrieve') }}">{{ __('繳回收據列表') }}</a>
                                    <a class="dropdown-item" href="{{ route('Disabled') }}">{{ __('已關閉收據列表') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin') }}">{{ __('收據管理') }}</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="performanceDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    招生業績
                                </a>
                                <div class="dropdown-menu" aria-labelledby="performanceDropdown">
                                    <a class="dropdown-item" href="{{ route('worksheet') }}">{{ __('業績工作表') }}</a>
                                    <a class="dropdown-item" href="{{ route('PerformanceTable') }}">{{ __('業績查詢') }}</a>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
{{--                             <li><a class="nav-link" href="{{ route('login') }}">{{ __('登入') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('登出') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteModalLabel">提示</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-primary">確認</a>
                        <button type="button" class="btn btn-secondary"  data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
@section('js')

<script src="{{ asset('js/jquery-3.3.1.js') }}" defer></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

@show
</body>
</html>
