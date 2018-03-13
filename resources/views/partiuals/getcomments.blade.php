<br><br>
<h3>All Comments :</h3>
<hr>
<ul class="nav nav-link">
    @foreach($comments as $comment)
        <li><a href="" class="text-danger">{{\Illuminate\Support\Facades\Auth::user()->name}} : &nbsp;</a>{{$comment->body}}  &nbsp;&nbsp;&nbsp; [{{$comment->created_at}}]</li>
    @endforeach
</ul>