@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <div style="float: left; margin: 0;" class="col-md-9 pull-left nopadding">
                <div class="jumbotron">
                    <h1>{{$project->name}}</h1>
                    <p class="lead">{{$project->description}}</p>
                    <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
                </div>

                <div class="row">
                    <div class="container-fluid">
                        <form action="{{route('comments.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="commentable_id" value="{{$project->id}}">
                            <input type="hidden" name="commentable_type" value="App\Project">
                            <div class="form-group">
                                <label for="body">Comment :</label>
                                <textarea class="form-control" name="body" id="body" cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">attachments :</label>
                                <textarea class="form-control" name="url" id="url" cols="30" rows="2"></textarea>
                            </div>
                            <input type="submit" class="btn btn-danger" value="Submit">
                        </form>
                        @include('partiuals.getcomments')
                    </div>

                </div>
            </div>
            <div style="float: right; margin: 0;" class="col-md-3 pull-right nopadding">


                <div class="sidebar-module">
                    <h4>Manage</h4>
                    <ol class="list-unstyled">
                        <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
                        <li><a href="#" onclick="deletepost();">Delete
                            <script>
                                function deletepost() {
                                    var $response = confirm('Do you want to Delete {{$project->name}} post?');
                                    if ($response){
                                        document.getElementById('deletepost').submit();
                                    }
                                }
                            </script>

                            </a>
                            <form id="deletepost" action="{{route('projects.destroy',[$project->id])}}" method="post" style="display: none;">
                                {{csrf_field()}}
                                {!! method_field('delete') !!}

                            </form>

                        </li>
                        <li><a href="">Add new Project</a></li>
                    </ol>
                </div>

                {{--<div class="sidebar-module">--}}
                    {{--<h4>Archives</h4>--}}
                    {{--<ol class="list-unstyled">--}}
                        {{--<li><a href="#">March 2014</a></li>--}}
                    {{--</ol>--}}
                {{--</div>--}}

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@endsection