<html class="fuelux" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::: {{ $title }} :::</title>
    @include('Shared/commonCss')
    @include('Shared/commonTopJs')
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link rel="shortcut icon" type="image/png" href="favicon.ico" />
   
</head>

<body>

    <section class="content">
      <!-- Sidebar Start -->
        <div class="sidebar">
          @include('Shared/leftsidebar')
        </div>
      <!-- Sidebar End -->

        <div class="content-liquid-full">
            <div class="container">
                <!-- Row Start -->
                <div class="row" style="margin-top: 10px;">
                    @yield('content')
                </div>
                <!-- Row End -->

                <!-- Footer Line Start -->
                <div class="footer-line">
                </div>
                @include('Shared/modal')

            </div>
        </div>
    </section>

    @include('Shared/commonJs')

</body>
</html>