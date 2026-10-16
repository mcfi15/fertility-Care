<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\StoresUploads;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

/**
 * Admin ▸ Blog — the only place blog posts can be created or edited. The Blog
 * listing, the recent-posts widgets and the single-post view all read here.
 */
class PostController extends Controller
{
    use StoresUploads;

    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::query()->latestFirst()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.post.create', [
            'post' => new Post(['is_published' => true]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['slug']         = Post::makeSlug($data['title'], $data['slug'] ?? null);
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['published_at'] ?? now();

        if ($file = $request->file('featured_image')) {
            $data['featured_image'] = $this->storeImage(null, $file, 'posts');
        }

        Post::query()->create($data);

        return redirect()->route('admin.posts.index')
            ->with('message', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validated($request, $post);

        $data['slug']         = Post::makeSlug($data['title'], $data['slug'] ?? null);
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['published_at'] ?? $post->published_at;

        if ($file = $request->file('featured_image')) {
            $data['featured_image'] = $this->storeImage($post->featured_image, $file, 'posts');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('message', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->featured_image && ! str_starts_with($post->featured_image, '/')) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('message', 'Post deleted.');
    }

    public function toggle(Post $post)
    {
        $post->update(['is_published' => ! $post->is_published]);

        return back()->with('message', 'Post publish status updated.');
    }

    /** @return array<string, mixed> */
    protected function validated(Request $request, ?Post $post = null): array
    {
        return $request->validate([
            'title'          => ['required', 'string', 'max:200'],
            'slug'           => [
                'nullable', 'string', 'max:200', 'regex:/^[a-z0-9-]+$/',
                Rule::unique('posts', 'slug')->ignore($post?->id),
            ],
            'category'       => ['nullable', 'string', 'max:80'],
            'excerpt'        => ['nullable', 'string', 'max:600'],
            'body'           => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,gif,svg', 'max:4096'],
            'author'         => ['nullable', 'string', 'max:120'],
            'published_at'   => ['nullable', 'date'],
        ]);
    }
}
