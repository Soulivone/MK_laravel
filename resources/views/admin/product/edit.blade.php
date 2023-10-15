@extends('layouts.admin')

@section('content')
    <style>
        .card-create-index {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>
    <div class="card-create-index row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">Update Admins</h4>
        </div>
        <div class="py-3 px-5">
            <form action="{{ route('admin.admin.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row justify-content-center">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name..." value="{{ $data->name }}">
                        @if ($errors->has('name'))
                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row justify-content-center">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email..." value="{{ $data->email }}">
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row justify-content-center">
                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-6 input-group w-50">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password..." value="{{ $data->password_show }}">
                        <button class="input-group-text toggle-password" type="button" data-target="#password">
                            <i class="fa fa-eye"></i>
                        </button>
                        @if ($errors->has('password'))
                            <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 mt-5 row d-flex">
                    <div class="col-sm offset-sm-2">
                        <a href="{{ route('admin.admin.index') }}" class="btn border">Cancel</a>
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
