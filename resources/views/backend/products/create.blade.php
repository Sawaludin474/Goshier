@extends('backend.master')
@section('title')
    Products
@endsection
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- Product Name -->
                <div class="form-group row">
                    <label for="p_name" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p_name" id="p_name" placeholder="Product Name">
                        @error('p_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Price -->
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- File Input for Image -->
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control h-10" id="images" name="image" multiple
                                accept="image/*">
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-default float-right">Cancel</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
