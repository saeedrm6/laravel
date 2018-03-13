@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="{{route('projects.update',[$project->id])}}">
                {!! method_field('patch') !!}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Project Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$project->name}}">
                </div>
                <div class="form-group">
                    <label for="description">Password</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$project->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <a href="/projects/{{$project->id}}" class="btn btn-danger">Back</a>
            </form>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection