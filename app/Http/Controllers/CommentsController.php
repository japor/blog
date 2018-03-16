<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Blog;
use App\Comment;

class CommentsController extends Controller
{
    //
    public function store(Blog $blog)
    {

    	$this->validate(request(),[
    		'body'=>'required|min:2'
    	]);

    	// Auth()->user()->addComment(
     //        new Comment(request(['body']))
     //    );

    	$blog->addComment(request('body'));

    	return back();
    }
}
