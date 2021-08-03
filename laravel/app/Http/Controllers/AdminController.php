<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Student;

class AdminController extends Controller
{
    public function index() {
        $posts = Post::all();
        $students = Student::all();
        $instructors = Instructor::all();
        $categories = Category::with('posts')->get();
        $top_posts = Post::orderBy('views', 'DESC')->with('user')->paginate(3);
        $category_posts = [];
        $category_names = [];
        foreach($categories as $category) {
            array_push($category_names, $category->name);
            array_push($category_posts, count($category->posts));
        }
        return view('admin.dashboard', [
            'posts' => $posts,
            'students' => $students,
            'instructors' => $instructors,
            'categories' => $categories,
            'top_posts' => $top_posts,
            'category_names' => $category_names,
            'category_posts' => $category_posts
        ]);
    }
    public function posts() {
        $posts = Post::with('user', 'category')->get();
        return view('admin.posts.all', ['posts' => $posts]);
    }
    public function postscreate(){
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }
    public function webinfo(){
        $path = storage_path() . "\json\info.json";
        $info = json_decode(file_get_contents($path));
        return view('admin.websiteinfo', ['info' => $info]);
    }

    public function updateWebsiteInfo(Request $req) {
        $info = [
            "name" => $req->input('website-name'),
            "about" => $req->input('website-about'),
            "email" => $req->input('website-email')
        ];

        $path = storage_path() . "/json/info.json";
        file_put_contents($path, json_encode($info));

        return back();
    }
    public function categories(){
        $categories = Category::with('posts')->get();
        return view('admin.categories.all', ['categories' => $categories]);
    }

    public function categoriescreate(){
        return view('admin.categories.create');
    }

    public function categoriesedit($id) {
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', ['category'=>$category]);
    }
    public function subcategories(){
        return view('admin.sub-categories.all');
    }
    public function roles(){
        return view('admin.roles');
    }
    public function users(){
        $users = User::all();
        return view('admin.users.all', ['users' => $users]);
    }
    public function viewUser($id) {
        $user = User::where('id', $id)->with('posts', 'comments', 'admin', 'instructor', 'moderator', 'student')->first();
        return view('admin.users.view', ['user' => $user]);
    }
    public function moderatorRequest()
    {
        $users = User::where('type', 'moderator')->where('status', 4)->get();
        return view('admin.moderator-requests', ['users' => $users]);
    }
    public function approveModerator($id)
    {
        $moderator = User::where('id', $id)->first();
        $moderator->status = 1;
        $moderator->timestamps = false;
        $moderator->update();

        return back();
    }
    public function declineModerator($id)
    {
        $moderator = User::where('id', $id)->first();
        $moderator->status = -1;
        $moderator->timestamps = false;
        $moderator->update();

        return back();
    }
    // public function privacy_policy() {
    //     return view('admin')
    // }
}
