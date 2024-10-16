<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author', 'category')->get();
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('posts.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Set default value for is_published
        $isPublished = $request->has('is_published') ? 1 : 0;

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('asset-images', 'public');
        }

        // Create the post
        Post::create(array_merge($request->all(), [
            'is_published' => $isPublished,
            'image' => $imagePath
        ]));

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }



    public function edit(Post $post)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'authors', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published'  => 'nullable|boolean',
            'category_id'   => 'required|exists:categories,id',
            'author_id'     => 'required|exists:authors,id',
        ]);

        try {
            $imagePath = $post->image; // Simpan path gambar lama
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('asset-images', 'public'); // simpan path gambar baru
            }

            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath, // Simpan path gambar baru atau yang lama
                'is_published' => $request->is_published ?? false,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
