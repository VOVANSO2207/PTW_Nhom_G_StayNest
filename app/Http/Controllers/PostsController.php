<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function viewPost()
    {
        $posts = Posts::getAllPosts();
        return view('admin.post', compact('posts'));
    }
    
    public function postAdd()
    {
        return view('admin.post_add');
    }

    public function getPostDetail($post_id)
    {
        $post = Posts::findPostById($post_id);

        if (!$post) {
            return response()->json(['error' => 'Bài viết không tồn tại'], 404);
        }

        return response()->json([
            'title' => $post->title,
            'description' => $post->description,
            'content' => $post->content,
            'meta_desc' => $post->meta_desc,
            'url_seo' => $post->url_seo,
            'status' => $post->status,
            'img' => $post->img
        ]);
    }

    public function store(Request $request)
    {
        $post = new Posts();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content1;
        $post->meta_desc = $request->meta_desc;
        $post->url_seo = $request->url_seo;
        $post->status = $request->status;

        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $post->img = $filename;
        }
        Posts::createPost($post->toArray());
        return redirect()->route('admin.viewpost')->with('success', 'Thêm bài viết thành công.');
    }




}
