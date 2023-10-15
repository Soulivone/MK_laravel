@extends('layouts.admin')

@section('content')
    <style>
        .card-category-index {
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

        .btn-new-category {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>
    <div class="card-category-index row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">All Categorys</h4>
            <a href="{{ route('admin.category.create') }}" class="btn-new-category btn bg-black btn-sm mb-0 text-white"
                type="button">+&nbsp; New Category</a>
        </div>
        <div class="p-0">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->category_name }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', $data->id) }}" class="me-3">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                <form action="{{ route('admin.category.delete', $data->id) }}" method="POST"
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
