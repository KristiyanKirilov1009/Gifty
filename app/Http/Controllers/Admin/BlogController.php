<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends AdminController
{
    public function __construct()
    {
        $this->datatable = ['title', 'created_at'];
        $this->module = 'blogs';
        $this->filters = true;

        $this->authorizeResource(Blog::class, 'blog');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Blog::latest()->paginate(10);

        return view('admin.blogs.list', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title)
        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $path = $file->storePublicly("/images/blogs/{$blog->id}", 'public');

            $image = new Image([
                'name' => $file->getClientOriginalName(),
                'filename' => $file->hashName(),
                'filepath' => $path,
                'filesize' => $file->getSize()
            ]);

            $blog->image()->save($image);
        }

        return redirect('/admin/blogs')->with('success', __('messages.success.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->fill($request->all())->save();

        if($request->hasFile('image'))
        {
            if($blog->image && Storage::exists($blog->image->filepath))
            {
                Storage::delete('public/' . $blog->image->filepath);
            }

            $blog->image()->delete();

            $file = $request->file('image');
            $path = $file->storePublicly("images/blogs/{$blog->id}", 'public');
    
            $image = new Image([
                'name' => $file->getClientOriginalName(),
                'filename' => $file->hashName(),
                'filepath' => $path,
                'filesize' => $file->getSize()
            ]);
    
            $blog->image()->save($image);
        }

        return back()->with('success', __('messages.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (!$blog->delete()) {
            return back()->with('errors', __('messages.errors.delete'));
        }

        return back()->with('success', __('messages.success.deleted'));
    }
}
