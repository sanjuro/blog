@foreach($comments as $comment)
	<div >
		{{ $comment->text }}
		<p> Created by {{$comment->user->name}} </p>
		<p style="font-size:9px;">{{ date('M d, Y h:i A', strtotime($comment->created_at)) }}</p>
	</div>
@endforeach