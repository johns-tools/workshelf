<!DOCTYPE html>
<html class="h-full bg-gray-900">
<head>
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
    <body class="h-full">

        <?php // Move to controller.
           $data = ["one" => 1, "two" => 2, "three" => 3];
        ?>

        <div id="app">
            <login class="flex flex-col justify-middle items-center h-full" 
                   :init-data='@json($data)'
                   csrf-token='{{ csrf_token() }}'>
            </login>
        </div>
        
    </body>
</html>
