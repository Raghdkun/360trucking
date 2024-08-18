<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('booking/fonts/icomoon/style.css') }}">
    <link href='{{ asset('booking/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('booking/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('booking/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('booking/css/style.css') }}">
    <title>@yield('title', 'Calendar App')</title>
  </head>
  <body>
    <div id='calendar-container'>
        @yield('content')
    </div>

    <script src="{{ asset('booking/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('booking/js/popper.min.js') }}"></script>
    <script src="{{ asset('booking/js/bootstrap.min.js') }}"></script>
    <script src='{{ asset('booking/fullcalendar/packages/core/main.js') }}'></script>
    <script src='{{ asset('booking/fullcalendar/packages/interaction/main.js') }}'></script>
    <script src='{{ asset('booking/fullcalendar/packages/daygrid/main.js') }}'></script>
    <script src='{{ asset('booking/fullcalendar/packages/timegrid/main.js') }}'></script>
    <script src='{{ asset('booking/fullcalendar/packages/list/main.js') }}'></script>
    <script src="{{ asset('booking/js/main.js') }}"></script>
    <script>
        @yield('scripts')
    </script>
  </body>
</html>
