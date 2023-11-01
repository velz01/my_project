<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function test()
    {
        return 'test in PostController';
    }


    public function main()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags') );
    }


    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
//        dd($tags,$data);

        $post = Post::create($data);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//            }
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
//        $post = Post::findOrFail($id);
//        dd($post->title);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(1);
        $post->restore();

    }

    public function firstOrCreate()
    {


        $post = Post::firstOrCreate([
            'title' => 'some title 2'
        ], [
            'title' => 'some title 2',
            'content' => 'updcontent',
            'likes' => 2,
            'is_published' => 0,
        ]);
        dump($post->content);

    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'some title 2',
        ], [
            'title' => 'some title 2',
            'content' => 'updcontentasdasda2',
            'likes' => 2,
            'is_published' => 0,
        ]);

    }
}
