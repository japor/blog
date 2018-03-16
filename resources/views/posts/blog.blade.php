<div class="blog-post">
	<h2 class="blog-post-title">
	    <a href="/blog/{{$blog->id}}">
	      {{$blog->title}} 
	    </a>
	</h2>
	<p class="blog-post-meta">{{$blog->created_at->toFormattedDateString()}} <a href="#"> - <small>{{$blog->user->name}}</small></a></p>

	<p>{{$blog->body}}</p>
</div><!-- /.blog-post -->