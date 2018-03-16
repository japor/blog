@extends('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">
	<form method="POST" action="/blog/create">
		{{csrf_field()}}
		@include('layouts.error')
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title">
		</div>
		<div class="form-group">
			<label>Body</label>
			<textarea id="body" class="form-control" name="body"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Publish</button>
		</div>
		
	</form>
</div>
@endsection