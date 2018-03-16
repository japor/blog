@extends('layouts.master')

@section('content')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="col-sm-8 blog-main">

  @if(count($blogs))
    @foreach($blogs as $blog)
      @include('posts.blog')
    @endforeach
  @endif
  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
  </nav>

</div><!-- /.blog-main -->
@endsection