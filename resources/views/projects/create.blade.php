@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="{{route('projects.store')}}">
                {{csrf_field()}}
                @if(isset($company))
                    <input type="hidden" name="company_id" value="{{$company->id}}" id="company_id">
                @else
                    <div class="form-group">
                        <label for="company" class="">Company</label>
                        <select class="form-control text-white bg-dark" name="company_id" id="company">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Project Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Project Name">
                </div>
                <div class="form-group">
                    <label for="days">Days</label>
                    <input type="number" placeholder="Days" name="days" id="days">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('projects.index')}}" class="btn btn-danger">Back</a>
            </form>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection