@extends('layouts.admin')

@section('content')
    <style>
        .card-create-index {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>
    <div class="card-create-index row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">Add Categies</h4>
        </div>
        <div class="py-3 px-5">
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="mb-3 row justify-content-center">
                    <label for="category_name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name...">
                        @if ($errors->has('category_name'))
                            <span class="help-block text-danger">{{ $errors->first('category_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 mt-5 row d-flex">
                    <div class="col-sm offset-sm-2">
                        <a href="{{ route('admin.category.index') }}" class="btn border">Cancel</a>
                    </div>

                    <div class="col-sm offset-sm-2">
                        <button type="submit" class="btn btn-dark text-white">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
