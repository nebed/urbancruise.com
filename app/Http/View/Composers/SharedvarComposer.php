<?php 

	namespace App\Http\View\Composers;


	use Illuminate\Contracts\View\View;
	use App\Post;
	use App\Category;


	class SharedvarComposer
	{

		public function _construct()
		{
		}

		public function compose(View $view)
		{
			$breakingnews = Post::where('status','PUBLISHED')->orderBy('created_at', 'desc')->take(3)->get();
			$latestposts = Post::where('status','PUBLISHED')->orderBy('created_at', 'desc')->take(4)->get();
			$categories = Category::all();
			$hotcategories = Category::orderBy('created_at', 'desc')->take(5)->get();
			$mostviewed = Post::select(\DB::raw('posts.*,count(*) as `aggregate`'))->withCount('views')->withCount('comments')->join('post_views','posts.id', '=', 'post_views.post_id')->groupBy('post_id')->where('status','PUBLISHED')->orderBy('aggregate', 'desc')->take(5)->get();
			$view->with('breakingnews', $breakingnews)->with('latestposts', $latestposts)->with('categories',$categories)->with('mostviewed', $mostviewed)->with('hotcategories', $hotcategories);
		}
	}