@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Product page</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                    <tr>
                        <td> {{$item ->id}}</td>
                        <td> {{$item ->name}}</td>
                        <td> {{$item ->description}}</td>
                        <td>
                            <a href="{{url('edit-prod/'.$item->id)}}" class="btn btn-primary"> Edit</a>
                            <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger"> Delete</a>
                        </td>
                    @endforeach
                </tbody>
        </div>
    </div>
@endsection