<br><br>
<h3>All Comments :</h3>
<hr>
<ul class="nav nav-link">
    @foreach($comments as $comment)
        <li><a href="" class="text-danger">{{ $comment->user->email }}</a> : &nbsp;{{$comment->body}}  &nbsp;&nbsp;&nbsp; [{{$comment->created_at}}]</li>
    @endforeach
</ul>