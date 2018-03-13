@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="{{route('companies.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('companies.index')}}" class="btn btn-danger">Back</a>
            </form>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection