<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageFormRequest;
use Illuminate\Http\Request;
use App\Blog;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        //
        $blogs = Blog::latest(); 
        $archives = Blog::selectRaw('YEAR(created_at) AS year, MONTHNAME(created_at) AS month,COUNT(*) AS published')
        ->groupBy('year','month')
        ->orderByRaw('MONTH(created_at) desc')
        ->get();

        if($month=request('month')){
            $blogs->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if($year=request('year')){
            $blogs->whereYear('created_at',$year);
        }

        $blogs = $blogs->get();

        // return $archives;
        return view('posts.index',compact('blogs','archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public  function store()
    {
        //

      $this->validate(request(),[
        'title'=>'required',    
        'body'=>'required'

      ]);

        Auth()->user()->publish(
            new Blog(request(['title','body']))
        );
     
  
      return redirect("/");

    }

    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // //
        // $blog = Blog::find($id);
 
        return view('posts.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    

  
}
