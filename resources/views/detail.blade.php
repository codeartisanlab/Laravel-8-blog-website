@extends('frontlayout')
@section('title',$detail->title)
@section('content')
		<div class="row">
			<div class="col-md-8">
				@if(Session::has('success'))
					<p class="text-success">{{session('success')}}</p>
				@endif
				<div class="card">
					<h5 class="card-header">{{$detail->title}}</h5>
					<img src="{{asset('imgs/full/'.$detail->full_img)}}" class="card-img-top" alt="{{$detail->title}}">
					<div class="card-body">
						{{$detail->detail}}
					</div>
				</div>
				@auth
				<!-- Add Comment -->
				<div class="card my-5">
					<h5 class="card-header">Add Comment</h5>
					<div class="card-body">
						<form method="post" action="{{url('save-comment/'.Str::slug($detail->title).'/'.$detail->id)}}">
						@csrf
						<textarea name="comment" class="form-control"></textarea>
						<input type="submit" class="btn btn-dark mt-2" />
					</div>
				</div>
				@endauth
				<!-- Fetch Comments -->
				<div class="card my-4">
					<h5 class="card-header">Comments <span class="badge badge-dark">{{count($detail->comments)}}</span></h5>
					<div class="card-body">
						@if($detail->comments)
							@foreach($detail->comments as $comment)
								<blockquote class="blockquote">
								  <p class="mb-0">{{$comment->comment}}</p>
								  @if($comment->user_id==0)
								  <footer class="blockquote-footer">Admin</footer>
								  @else
								  <footer class="blockquote-footer">{{$comment->user->name}}</footer>
								  @endif
								</blockquote>
								<hr/>
							@endforeach
						@endif
					</div>
				</div>
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				<!-- Search -->
				<div class="card mb-4">
					<h5 class="card-header">Search</h5>
					<div class="card-body">
						<form action="{{url('/')}}">
							<div class="input-group">
							  <input type="text" name="q" class="form-control" />
							  <div class="input-group-append">
							    <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
							  </div>
							</div>
						</form>
					</div>
				</div>
				<!-- Recent Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Recent Posts</h5>
					<div class="list-group list-group-flush">
						@if($recent_posts)
							@foreach($recent_posts as $post)
								<a href="#" class="list-group-item">{{$post->title}}</a>
							@endforeach
						@endif
					</div>
				</div>
				<!-- Popular Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Popular Posts</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Post 1</a>
						<a href="#" class="list-group-item">Post 2</a>
					</div>
				</div>
			</div>
		</div>
@endsection('content')