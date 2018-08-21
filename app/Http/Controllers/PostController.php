<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Tag;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); //auth means only users can access controller
    }

    public function index()
    {
        //create a variable and store all the post in it from database
        $posts = Post::orderBy('id','desc')->paginate(10);
//        $posts = Post::all();
        return view('posts.index')->withPosts($posts);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        //validate the data
        $this->validate($request,array(
           'title'          => 'required|max:255',
            'slug'          => 'required|alpha_dash|min:5|max:255',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ));

        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();

        //unsolveble @@
        $post->tags()->sync($request->tags, false);

        Session::flash('success','Successfully saved');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2= array();
        foreach ($tags as $tag){
            $tags2[$tag->id]= $tag->name;
        }
            return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate the data
        $this->validate($request,array(
            'title'         => 'required|max:255',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'   => 'required|integer',
            'body'          => 'required'

        ));
        //Save to database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');

        $post->body = $request->input('body');
        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else{
            $post->tags()->sync(array());
        }
        Session::flash('success', 'This post was successfully saved.');
        //Redirect to index view
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //remove references of post and tag
        $post->tags()->detach();

        $post->delete();

        Session::flash('success','Successfully deleted.');
        return redirect()->route('posts.index');
    }
}
