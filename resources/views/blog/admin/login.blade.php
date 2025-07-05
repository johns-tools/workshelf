<!DOCTYPE html>
<html class="h-full dark">
<head>
    <title>Blog Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full text-white bg-gray-900">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-gray-800 rounded-lg shadow-lg">
            <div class="text-center">
                <h2 class="text-3xl font-bold">Blog Admin Login</h2>
                <p class="mt-2 text-sm text-gray-400">Enter your admin password to continue</p>
            </div>

            @if(session('success'))
                <div class="p-4 bg-green-600 text-white rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('blog.admin.login') }}" class="space-y-4">
                @csrf
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" name="password" id="password" 
                           class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                    Login
                </button>
            </form>

            <div class="text-center">
                <a href="/blog" class="text-sm text-blue-400 hover:text-blue-300">← Back to Blog</a>
            </div>
        </div>
    </div>
</body>
</html>