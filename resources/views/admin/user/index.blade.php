@extends('layouts.admin')

@section('content')
    <style>
        .card-user-index {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }

        .table td {
            border-top-width: var(--bs-border-width);
            border-bottom-width: 0px !important;
        }

        .table th,
        .table td {
            background: white;
            vertical-align: middle;
        }

        .btn-new-user {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>
    <div class="card-user-index row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">All Users</h4>
            <a href="{{ route('admin.user.create') }}" class="btn-new-user btn bg-black btn-sm mb-0 text-white"
                type="button">+&nbsp; New User</a>
        </div>
        <div class="p-0">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td id="password-{{$data->id}}" data-password="{{ $data->password_show }}">********</td>
                            <td>{{ $data->phone }}</td>
                            <td>
                                <button class="toggle-password border-0 bg-transparent me-3" data-target="#password-{{$data->id}}">
                                    <i class="fa fa-eye text-secondary"></i>
                                </button>
                                <a href="{{ route('admin.user.edit', $data->id) }}" class="me-3">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                <form action="{{ route('admin.user.delete', $data->id) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 bg-transparent">
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                const password = $($(this).data('target'));
                const oldPassword = password.data('password');
                if (password.text() === '********') {
                    password.text(oldPassword);
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    password.text('********');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
@endsection
