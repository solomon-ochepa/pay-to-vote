<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('app') }}/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app') }}/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/tiny-slider/dist/tiny-slider.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app') }}/vendor/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app') }}/vendor/glightbox-master/dist/css/glightbox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/dropzone/dist/dropzone.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/flatpickr/dist/flatpickr.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app') }}/vendor/plyr/plyr.css" />

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('app') }}/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GMKQ4P9YMZ');
    </script>

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <!-- Styles -->
    @livewireStyles

    @stack('css')
</head>

<body>
    <livewire:layouts.app.header />

    <main>
        <!-- Container START -->
        <div class="container">

            @stack('widgets.top')

            <div class="row">
                <div class="col-12">
                    <livewire:alerts />
                </div>
            </div>

            <div class="row g-4">
                {{ $slot }}
            </div>

            @stack('widgets.buttom')

        </div>
    </main>

    <!-- Vote from anywhere -->
    @push('modals')
        <livewire:vote.modal />
    @endpush

    @stack('modals')

    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('app') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="{{ asset('app') }}/vendor/tiny-slider/dist/tiny-slider.js"></script>
    <script src="{{ asset('app') }}/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js"></script>
    <script src="{{ asset('app') }}/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="{{ asset('app') }}/vendor/glightbox-master/dist/js/glightbox.min.js"></script>
    <script src="{{ asset('app') }}/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="{{ asset('app') }}/vendor/plyr/plyr.js"></script>
    <script src="{{ asset('app') }}/vendor/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Template Functions -->
    <script src="{{ asset('app/js/functions.js') }}"></script>

    @stack('js')

    @livewireScripts
</body>

</html>
