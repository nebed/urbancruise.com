<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Tag;
use App\Category;
use Mail;
use Session;
use Carbon\Carbon;


class PagesController extends Controller {
	public function getHome(){
		$featuredposts = Post::where('featured',true)->where('status','PUBLISHED')->withCount('views')->withCount('comments')->get();
		$trendingposts = Post::select(\DB::raw('posts.*,count(*) as `aggregate`'))->withCount('views')->withCount('comments')->whereDate('post_views.created_at','=', Carbon::today())->join('post_views','posts.id', '=', 'post_views.post_id')->where('status','PUBLISHED')->groupBy('post_id')->orderBy('aggregate', 'desc')->take(3)->get();
		$posts = Post::where('status','PUBLISHED')->orderBy('created_at', 'desc')->take(6)->get();
		$featured_categories = Category::where('featured',true)->get();
		$tagfoot = Tag::all();
		return view('pages.index')->withPosts($posts)->withFeaturedposts($featuredposts)->withTrendingposts($trendingposts)->withFeaturedcategories($featured_categories);
	}
	public function getAbout(){
		$categorylist = Category::all();
		$tagfoot = Tag::all();
		return view('pages.about')->withTagfoot($tagfoot);
	}
	public function getContact(){
		return view('pages.contact');
	}
	public function postContact(Request $request){

		$this->validate($request, [
			'cName' => 'required|max:255',
			'cEmail' => 'required|email|max:255',
			'message' => 'required|min:10',
            'cSubject' => 'required|min:5',
		]);
		$data = array(
			'cEmail'=> $request->cEMail,
			'cName'=> $request->cName,
			'cSubject'=> $request->cSubject,
			'bodyMessage'=> $request->message

		);

		Mail::send('emails.contact', $data, function($message) use($data){
			$message->from($data['cEmail']);
			$message->to('hello@bettykingsdaily.com');
			$message->subject($data['cSubject']);

		});
		Session::flash('success','Your Email was Sent!');
		return redirect('/');

	}
}

