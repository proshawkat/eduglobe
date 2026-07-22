<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', ['posts' => BlogPost::orderByDesc('published_at')->get()]);
    }

    public function create()
    {
        return view('admin.blog.form', ['post' => new BlogPost()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string',
            'content'      => 'nullable|string',
            'image_url'    => 'nullable|url',
            'tag'          => 'required|string|max:100',
            'read_time'    => 'required|integer|min:1',
            'published_at' => 'required|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title) . '-' . time();

        BlogPost::create($data);
        return redirect()->route('admin.blog.index')->with('success', 'Blog post published!');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.form', ['post' => $blog]);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string',
            'content'      => 'nullable|string',
            'image_url'    => 'nullable|url',
            'tag'          => 'required|string|max:100',
            'read_time'    => 'required|integer|min:1',
            'published_at' => 'required|date',
        ]);

        $blog->update($request->all());
        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated!');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted!');
    }
}
