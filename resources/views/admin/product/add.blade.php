@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Product</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="cio-md-12 mb-3">
                    <select class="form-select" name="cate_id">
                        <option value="">Select a Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Small Description</label>
                    <input type="text" class="form-control" name="small_description" rows="3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" rows="3">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" class="form-control" name="original_price" rows="3">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" rows="3">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control" name="tax" rows="3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="qty" rows="3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" class="form-control" name="selling_price" rows="3">
                </div>


                <div class="col-md-1 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" class="form-control" name="status">
                </div>
                <div class="col-md-1 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" class="form-control" name="trending">
                </div>

                
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" rows="3">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>


            </div>
    </div>
    @endsection
