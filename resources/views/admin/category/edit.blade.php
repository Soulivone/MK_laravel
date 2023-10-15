@extends('layouts.admin')

@section('content')
    <style>
        .card-edit-index {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>
    <div class="card-edit-index row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">Update Categories</h4>
        </div>
        <div class="py-3 px-5">
            <form action="{{ route('admin.category.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row justify-content-center">
                    <label for="category_name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="ncategory_ame" name="category_name" placeholder="Enter category name..." value="{{ $data->category_name }}">
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

@section('script')
    <script type="module">
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                $(this).toggleClass('active');
                var input = $($(this).attr('data-target'));
                if (input.attr('type') === 'password') { // แก้ไขเครื่องหมายเปรียบเทียบที่นี่
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
