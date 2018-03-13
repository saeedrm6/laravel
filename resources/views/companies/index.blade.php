@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <a href="{{route('companies.create')}}" class="btn btn-primary pull-right">New Company</a>
        <div class="clearfix"></div>
        <div class="panel panel-danger col-md-12">
            <div class="panel-heading">
                <h3 class="panel-title">Companies</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                @foreach($compaines as $company)
                    <li class="list-group-item"><a href="/companies/{{$company->id}}">{{$company->name}}</a></li>
            @endforeach
                </ul>
            </div>
        </div>



    </div>
    <div class="clearfix"></div>

@endsection



