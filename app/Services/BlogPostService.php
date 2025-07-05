<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostService
{
    private string $postsFile = 'blog_posts.json';

    public function all(): array
    {
        if (!Storage::exists($this->postsFile)) {
            return [];
        }

        $posts = json_decode(Storage::get($this->postsFile), true);
        
        // Sort by created_at desc
        usort($posts, fn($a, $b) => strcmp($b['created_at'], $a['created_at']));
        
        return $posts;
    }

    public function find(string $id): ?array
    {
        $posts = $this->all();
        
        foreach ($posts as $post) {
            if ($post['id'] === $id) {
                return $post;
            }
        }
        
        return null;
    }

    public function create(array $data): array
    {
        $post = [
            'id' => Str::uuid()->toString(),
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => Str::slug($data['title']),
            'published' => $data['published'] ?? false,
            'created_at' => Carbon::now()->toISOString(),
            'updated_at' => Carbon::now()->toISOString(),
        ];

        $posts = $this->all();
        $posts[] = $post;
        
        $this->savePosts($posts);
        
        return $post;
    }

    public function update(string $id, array $data): ?array
    {
        $posts = $this->all();
        
        foreach ($posts as &$post) {
            if ($post['id'] === $id) {
                $post['title'] = $data['title'] ?? $post['title'];
                $post['content'] = $data['content'] ?? $post['content'];
                $post['slug'] = isset($data['title']) ? Str::slug($data['title']) : $post['slug'];
                $post['published'] = $data['published'] ?? $post['published'];
                $post['updated_at'] = Carbon::now()->toISOString();
                
                $this->savePosts($posts);
                
                return $post;
            }
        }
        
        return null;
    }

    public function delete(string $id): bool
    {
        $posts = $this->all();
        $originalCount = count($posts);
        
        $posts = array_filter($posts, fn($post) => $post['id'] !== $id);
        
        if (count($posts) < $originalCount) {
            $this->savePosts($posts);
            return true;
        }
        
        return false;
    }

    public function getPublished(): array
    {
        return array_filter($this->all(), fn($post) => $post['published']);
    }

    private function savePosts(array $posts): void
    {
        Storage::put($this->postsFile, json_encode($posts, JSON_PRETTY_PRINT));
    }
}