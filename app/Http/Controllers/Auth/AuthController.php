<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Tag;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


//overwrite default functions
    public function showLoginForm()
    {
        $categorylist = Category::all();
        $tagfoot = Tag::all();
        $popularposts= Post::selectRaw("posts.*, count('comments.id') as comments_count")->leftJoin('comments','comments.post_id', '=', 'posts.id')->groupBy('posts.id')->orderBy('comments_count', 'desc')->take(6)->get();
        $view = property_exists($this, 'loginView')
                    ? $this->loginView : 'auth.authenticate';

        if (view()->exists($view)) {
            return view($view);
        }

        return view('auth.login')->withTagfoot($tagfoot)->withCategorylist($categorylist)->withPopularposts($popularposts);
    }

    public function showRegistrationForm()
    {
        $categorylist = Category::all();
        $tagfoot = Tag::all();
        $popularposts= Post::selectRaw("posts.*, count('comments.id') as comments_count")->leftJoin('comments','comments.post_id', '=', 'posts.id')->groupBy('posts.id')->orderBy('comments_count', 'desc')->take(6)->get();
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register')->withTagfoot($tagfoot)->withCategorylist($categorylist)->withPopularposts($popularposts);;
    }

//end overwrite

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'description' => 'required|min:15',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'description' => $data['description'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
