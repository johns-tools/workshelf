<!DOCTYPE html>
<html class="h-full dark">
<head>
    <title>Blog</title>
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
    <div class="max-w-3xl px-4 py-8 mx-auto space-y-6">
        <h1 class="mb-4 text-2xl font-bold">100 APIs of Code - Posts:</h1>
        @foreach ($articles as $article)
            <div class="p-4 border border-gray-700 rounded shadow">
                <a href="{{ $article['url'] }}" class="text-lg font-semibold text-blue-400 hover:underline">
                    {{ $article['title'] }}
                </a>
                <div class="text-sm text-gray-400">
                    {{ \Carbon\Carbon::parse($article['published_at'])->format('Y-m-d') }}
                </div>
                @if(!empty($article['tags']))
                    <div class="mt-1 text-sm">
                        @foreach($article['tags'] as $tag)
                            <span class="inline-block bg-gray-800 text-gray-300 px-2 py-0.5 rounded mr-1">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
