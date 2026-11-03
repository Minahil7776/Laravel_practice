<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'image' => $request->file('image') ? $request->file('image')->store('blog_images', 'public') : null,
        ]);

    return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');

}

    public function show(Blog $blog)
    {
        return view('blog-details', compact('blog'));
    }
}
