<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ SITE_NAME }}</title>
    @include('adminLte.partials.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        @include('adminLte.partials.nav')
        @include('adminLte.partials.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page-title', 'Something')</h1>
                        </div>
                        @include('adminLte.partials.breadcrumb')
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                @yield('control-bar')
            </div>
        </aside>
        @include('adminLte.partials.footer')
    </div>

    @include('adminLte.partials.scripts')
</body>

</html>
