@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <a href="{{route('projects.create')}}" class="btn btn-primary pull-right">New Project</a>
        <div class="clearfix"></div>
        <div class="panel panel-danger col-md-12">
            <div class="panel-heading">
                <h3 class="panel-title">Projects</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                @foreach($projects as $project)
                    <li class="list-group-item"><a href="/projects/{{$project->id}}">{{$project->name}}</a></li>
            @endforeach
                </ul>
            </div>
        </div>



    </div>
    <div class="clearfix"></div>

@endsection



