@extends('layouts.admin')

@section('content')
    <style>
        .card-order-index {
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

        .btn-new-order {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>
    <div class="card-order-index row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">All Orders</h4>
        </div>
        <div class="p-0">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->user ? $data->user->name: "" }}</td>
                            <td>{{ $data->total_price }}</td>
                            <td>{{ $data->status }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.product.show', $data->id) }}" class="me-3">
                                    <i class="fa fa-eye text-secondary"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
