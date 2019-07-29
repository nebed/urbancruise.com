<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\PostView;
use App\Http\Requests;

class BlogController extends Controller
{

	public function getIndex(){
        $categorylist = Category::all();
		$posts = Post::where('status','PUBLISHED')->orderBy('created_at', 'desc')->paginate(12);
        $popularposts= Post::selectRaw("posts.*, count('comments.id') as comments_count")->leftJoin('comments','comments.post_id', '=', 'posts.id')->groupBy('posts.id')->where('status','PUBLISHED')->orderBy('comments_count', 'desc')->take(6)->get();
        $tagfoot = Tag::all();
		return view('blog.index')->withPosts($posts)->withTagfoot($tagfoot)->withCategorylist($categorylist)->withPopularposts($popularposts);
	}

    public function getSingle($slug){
        $categorylist = Category::all();
    	//fetch post with slug from db
        $tagfoot = Tag::all();
        $popularposts= Post::selectRaw("posts.*, count('comments.id') as comments_count")->leftJoin('comments','comments.post_id', '=', 'posts.id')->groupBy('posts.id')->where('status','PUBLISHED')->orderBy('comments_count', 'desc')->take(6)->get();
    	$post= Post::where('slug', '=', $slug)->first(); //first is like limit 1
        $related_posts = Post::where('status','PUBLISHED')->whereHas("category", function($q) use ($post){
        $q->where('id','=',$post->category->id);})->take(2)->get();
        PostView::createViewLog($post);
        $prev = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->where('status','PUBLISHED')->first();;
        $next = Post::where('id', '>', $post->id)->orderBy('id', 'desc')->where('status','PUBLISHED')->first();

    	//return the view and pass in the post 
    	return view('blog.single')->withPost($post)->withCategorylist($categorylist)->withPrev($prev)->withNext($next)->withPopularposts($popularposts)->withRelatedposts($related_posts);
    }

    public function getList($name){
        $categorylist = Category::all();
        $tagfoot = Tag::all();
        $popularposts= Post::selectRaw("posts.*, count('comments.id') as comments_count")->leftJoin('comments','comments.post_id', '=', 'posts.id')->groupBy('posts.id')->where('status','PUBLISHED')->orderBy('comments_count', 'desc')->take(6)->get();
        $category_id = Category::where('name', '=', $name)->first()->id;
        $posts =Post::where('status','PUBLISHED')->whereHas("category", function($q) use ($category_id){
        $q->where('id','=',$category_id);})->paginate(12);
        return view('blog.index')->withPosts($posts)->withName($name)->withTagfoot($tagfoot)->withCategorylist($categorylist)->withPopularposts($popularposts);

    }

}
 