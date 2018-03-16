@extends('layouts.master')


@section('content')
	<div class="col-sm-8 blog-main">
		@include('posts.blog')

		<hr />
		<div class="comments">
			<ul class="list-group">
				@foreach($blog->comments as $comment)
					<li class="list-group-item">
						{{$comment->body}} &nbsp; : 
						<strong>{{$comment->created_at->diffForHumans()}}</strong>
					</li>
				@endforeach
			</ul>
		</div>
		<hr />
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/blog/{{$blog->id}}/comments">
					{{csrf_field()}}
					<div class="form-group">
						<textarea class="form-control" name="body" placeholder="Your comment here."></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Add Comment</button>
					</div>
					@include('layouts.error')
				</form>
			</div>
		</div>

	</div>
@endsection