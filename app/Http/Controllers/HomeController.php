<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = $this->getBlogList();
        $user = $this->getUserDetail();
        return view('home',compact('blog','user'));
    }

    protected function getBlogList(){
        return $blog = Blog::orderBy('id', 'desc')->paginate(3);
    }
    protected function getBlogDetail($id){
        return $blog = Blog::where('id',$id)->first();
    }

    protected function getUserDetail(){
        return $user = User::all();
    }


    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->authorid = Auth::id();
        $blog->save();
        return  response()->json(['status' => 'success'],200);
    }


    public function show($id){
        $blog = $this->getBlogDetail($id);
        return view('show',compact('blog'));
    }
}
