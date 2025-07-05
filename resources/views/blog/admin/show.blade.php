<!DOCTYPE html>
<html class="h-full dark">
<head>
    <title>{{ $post['title'] }}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full text-white bg-gray-900">
    <div class="max-w-4xl px-4 py-8 mx-auto">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold">{{ $post['title'] }}</h1>
                <div class="flex items-center space-x-4">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $post['published'] ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $post['published'] ? 'Published' : 'Draft' }}
                    </span>
                    <a href="{{ route('blog.admin.edit', $post['id']) }}" 
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Edit
                    </a>
                </div>
            </div>
            <div class="mt-2 text-sm text-gray-400">
                Created: {{ \Carbon\Carbon::parse($post['created_at'])->format('M d, Y \a\t g:i A') }}
                @if($post['updated_at'] !== $post['created_at'])
                    | Updated: {{ \Carbon\Carbon::parse($post['updated_at'])->format('M d, Y \a\t g:i A') }}
                @endif
            </div>
            <div class="mt-1 text-sm text-gray-500">
                Slug: {{ $post['slug'] }}
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg p-6">
            <div class="prose prose-invert max-w-none">
                {!! \Illuminate\Support\Str::markdown($post['content']) !!}
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <a href="{{ route('blog.admin.index') }}" 
               class="text-blue-400 hover:text-blue-300">← Back to Posts</a>
            <a href="{{ route('blog.admin.edit', $post['id']) }}" 
               class="text-yellow-400 hover:text-yellow-300">Edit Post</a>
            <form method="POST" action="{{ route('blog.admin.destroy', $post['id']) }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Are you sure you want to delete this post?')">
                    Delete Post
                </button>
            </form>
        </div>
    </div>
</body>
</html>