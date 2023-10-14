<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>CRM | People Lead | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.2.2">

    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.2.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @stack('css')
    @livewireStyles
    
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            @include('layouts.partials.sidebar')
            <!-- wrap @s -->
            <div class="nk-wrap ">
                @include('layouts.partials.header')
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                             
                                <div class="nk-block">
                                    @yield('content')
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @include('layouts.partials.footer')
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>

    <script src="./assets/js/bundle.js?ver=3.2.2"></script>
    <script src="./assets/js/scripts.js?ver=3.2.2"></script>
    
    @stack('script')
    @livewireScripts
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
<x-livewire-alert::flash />
</body>

</html>