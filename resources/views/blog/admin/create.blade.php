<!DOCTYPE html>
<html class="h-full dark">
<head>
    <title>Create Blog Post</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full text-white bg-gray-900">
    <div class="max-w-4xl px-4 py-8 mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Create New Blog Post</h1>
        </div>

        <form method="POST" action="{{ route('blog.admin.store') }}" class="space-y-6">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
                <input type="text" name="title" id="title" 
                       class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('title') }}" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-300">Content (Markdown)</label>
                <textarea name="content" id="content" rows="20" 
                          class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono"
                          required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-400">You can use Markdown syntax for formatting.</p>
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="published" value="1" class="rounded border-gray-600 text-blue-600 focus:ring-blue-500 focus:ring-offset-gray-800"
                           {{ old('published') ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-300">Published</span>
                </label>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Create Post
                </button>
                <a href="{{ route('blog.admin.index') }}" 
                   class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>