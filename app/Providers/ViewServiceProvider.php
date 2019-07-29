<?php
	
	namespace App\Providers;

	use Illuminate\Support\Facades\View;
	use Illuminate\Support\ServiceProvider;


	class ViewServiceProvider extends ServiceProvider 

	{

		public function register()
		{

		}

		public function boot()
		{
			view()->composer(['pages.*', 'blog.*', 'auth.*' , 'posts.show'],'App\Http\View\Composers\SharedvarComposer');
		}
	}