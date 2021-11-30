<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Excel SaaS | Automate spreadsheet processing </title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="/path/to/tailwind.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div style="min-height: 100vh;">
            <app id="app" style="min-height: 100%"> </app>
        </div>

        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
