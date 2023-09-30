@extends('layouts.admin')

@section('css')
    <style>
        .card {
            border: 0;
            background: black;
            box-shadow: 0 20px 27px 0 rgba(0,0,0,.05);
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex">
        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Admins:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">5</strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="fa-solid fa-user text-black opacity-10"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Users:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">25</strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="fa-solid fa-users text-black opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Products:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">99</strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="fa-solid fa-store text-black opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Order:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">
                                        3
                                    </strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="fa-solid fa-boxes-stacked text-black opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
