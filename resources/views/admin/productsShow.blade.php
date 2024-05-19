@extends('layouts.app')
@section('content')
    <div class="col-md-12 px-0 table-box">
        <div class="table-top-panel border-bottom d-flex align-items-center justify-content-between px-5 pt-5 pb-4">
            <p class="account-title mb-2">Product</p>
        </div>

        <div class="account-container min-vh-75 d-flex justify-content-center py-5">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="account-photo">
                            <img src="/storage/product/images/{{$product->image}}" class="w-100" alt="png">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="account-info">
                            <ul class="mb-5 pb-3">
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-6">
                                        <p class="account-info-title">
                                            Name:
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="account-info-text">
                                            {{$product->title}}
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-6">
                                        <p class="account-info-title">
                                            Min-description:
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="account-info-text">
                                            {{$product->min_description}}
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-6">
                                        <p class="account-info-title">
                                            Description:
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="account-info-text">
                                            {{$product->description}}
                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection