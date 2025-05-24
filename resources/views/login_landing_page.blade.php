<!DOCTYPE html>
<html class="h-full bg-gray-900">
<head>
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
    <body class="h-full">

        <div id="app">
            <login class="flex flex-col items-center h-full justify-middle"
                   :init-data='@json($data)'
                   csrf-token='{{ csrf_token() }}'>
            </login>
        </div>

    </body>
</html>
