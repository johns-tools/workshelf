<!DOCTYPE html>
<html class="h-full dark">
<head>
    <title>Petrol Car Mileage</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-R8QDSQRD0Z"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-R8QDSQRD0Z');
    </script>
</head>
<body class="h-full bg-gray-900 text-white">
    <div id="app" class="max-w-[750px] mx-auto">
        <petrol-car-mileage class="flex flex-col items-center h-full justify-middle"/>
    </div>
</body>
</html>
