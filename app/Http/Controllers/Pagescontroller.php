<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 13/08/2018
 * Time: 11:12
 */
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;

class PagesController extends Controller{
    public function getIndex(){
        $categories = Category::all();
        $tags = Tag::all();

        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts)->withCategories($categories)->withTags($tags);
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(){

    }
}
