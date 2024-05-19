@extends('layouts.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="d-flex justify-content-between align-items-center">
            <p class="title-list"> Products</p>
        </div>

        <div class="col-12 px-0 table-box">
            <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                {{--<ul class="d-flex">
                    <li class="col px-0 mx-3 table-top-panel-items --}}{{--active--}}{{-- {{route('expertice.index') ? 'active' : ''}}">
                        <a href="{{route('expertice.index')}}" class="text-decoration-none table-top-panel-items-link">Guvohnoma olganlar</a>
                    </li>
                    <li class="col px-0 mx-3 table-top-panel-items">
                        <a href="{{route('export2')}}" class="text-decoration-none table-top-panel-items-link">Excelga Yuklab olish</a>
                    </li>
                </ul>--}}


                <a href="{{route('products.create')}}" class="btn adding-button">
                    Add New <i class="fa fa-plus ml-2 mt-1"></i>
                </a>
            </div>


            <div class="table-responsive">
                <table class="table table-hover" id="org_table">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th class="darkblue-color text-center text-nowrap align-top"></th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product name</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product category</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product min-description</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product Description</th>
                        <th class="darkblue-color text-center text-nowrap align-top"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr></tr>
                        <th class="lightblue-color w-2 align-middle" scope="row">{{++$key}}</th>
                        <td class="darkblue-color d-flex align-items-center justify-content-end">
                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-outline-primary mr-3 text-nowrap">Update</a>
                        </td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><a href="{{route('products.show',$product->id)}}">{{$product->title}}</a></td>
                        <td class="darkblue-color text-center text-nowrap align-middle">{{$product->min_description}}</td>
                        <td class="darkblue-color text-center text-nowrap align-middle">@foreach($category as $cat){{$cat->title}}@endforeach</td>
                        <td class="darkblue-color text-center text-nowrap align-middle">{{$product->description}}</td>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-outline-danger mr-3" type="submit" onclick="return confirm('{{$product->title}} Are you sure?')" value="Delete" />
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <br/>
        {{--{{$projects->render()}}--}}
    </div>
@endsection


