<!DOCTYPE html>
<html class="h-full dark">
<head>
    <title>{{ $post['title'] }}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full text-white bg-gray-900">
    <div class="max-w-4xl px-4 py-8 mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">{{ $post['title'] }}</h1>
            <div class="mt-2 text-sm text-gray-400">
                Published: {{ \Carbon\Carbon::parse($post['created_at'])->format('M d, Y') }}
            </div>
        </div>

        <div class="prose prose-invert max-w-none">
            {!! \Illuminate\Support\Str::markdown($post['content']) !!}
        </div>

        <div class="mt-8 pt-6 border-t border-gray-700">
            <a href="/blog" class="text-blue-400 hover:text-blue-300">← Back to Blog</a>
        </div>
    </div>
</body>
</html>