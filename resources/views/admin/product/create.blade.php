@extends('layouts.admin')

@section('content')
    <style>
        .card-create-index {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>
    <div class="card-create-index row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">Add Admins</h4>
        </div>
        <div class="py-3 px-5">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row justify-content-center">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name...">
                        @if ($errors->has('name'))
                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="description" class="col-sm-2 col-form-label">Description:</label>
                    <div class="col-sm-6">
                        <textarea type="description" class="form-control" id="description" name="description" placeholder="Enter description..."></textarea>
                        @if ($errors->has('description'))
                            <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row justify-content-center">
                    <label for="price" class="col-sm-2 col-form-label">Price:</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="price" name="price" min="1" placeholder="Enter price...">
                        @if ($errors->has('price'))
                            <span class="help-block text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row justify-content-center">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity:</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" placeholder="Enter quantity...">
                        @if ($errors->has('quantity'))
                            <span class="help-block text-danger">{{ $errors->first('quantity') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row justify-content-center">
                    <label for="category_id" class="col-sm-2 col-form-label">Category:</label>
                    <div class="col-sm-6">
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="" disabled selected>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="help-block text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row justify-content-center">
                    <label for="image" class="col-sm-2 col-form-label">Image:</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="image" name="image">
                        @if ($errors->has('image'))
                            <span class="help-block text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 mt-5 row d-flex">
                    <div class="col-sm offset-sm-2">
                        <a href="{{ route('admin.product.index') }}" class="btn border">Cancel</a>
                    </div>

                    <div class="col-sm offset-sm-2">
                        <button type="submit" class="btn btn-dark text-white">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                $(this).toggleClass('active');
                var input = $($(this).attr('data-target'));
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
@endsection
