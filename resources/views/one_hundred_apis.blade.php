<!DOCTYPE html>
<html class="h-full dark">
<head>
    <title>ONE A DAY :: One Hundred APIs</title>
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
    <body class="h-full text-white bg-gray-900">
        <div class="spherical-gradient-bg"></div>
        <div id="app" class="max-w-[750px] mx-auto">
            <twenty-first-toolbar :config="toolbarConfig"></twenty-first-toolbar>
            <one-hundred-apis ></one-hundred-apis>
        </div>
    </body>
</html>
