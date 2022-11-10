<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Meta Tags -->
    <meta name="author" content="{{ env('APP_DOMAIN') }}">
    <meta name="description" content="{{ $description ?? '' }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('app') }}/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('app') }}/css/style.css">

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <!-- Styles -->
    @livewireStyles

    @stack('css')
</head>

<body>
    <main>
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100 py-5">
                <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card">
                        <livewire:alerts />

                        <x-jet-validation-errors class="alert alert-success alert-dismissible fade show mb-3 "
                            role="alert" />

                        <div class="card-body text-center">
                            @isset($title)
                                {!! $title !!}
                            @endisset

                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="{{ asset('app') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="{{ asset('app') }}/vendor/pswmeter/pswmeter.min.js"></script>

    <!-- Template Functions -->
    <script src="{{ asset('app') }}/js/functions.js"></script>

    @livewireScripts

    @stack('css')
</body>

</html>
