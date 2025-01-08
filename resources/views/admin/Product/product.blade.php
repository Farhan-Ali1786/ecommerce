@extends('admin.layout')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Product</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('admin.view_product', [0]) }}">
                    <button type="button" class="btn btn-outline-info  radius-30">Add Product</button>
                    </a>
                </div>
            </div>


            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td>
                                            <img src="{{ asset('/') }}/{{ $item->image }}" alt="Image"
                                                style="width: 100px; height: auto;">
                                        </td>
                                        <td>Name</td>

                                        <td>
                                            <a href="{{ route('admin.view_product', ['id' => $item->id]) }}">
                                                <button type="button" class="btn btn-outline-info  radius-30"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button>
                                            </a>
                                                <button onclick="deleteData('{{ $item->id }}','products')"
                                                    class="btn btn-outline-danger  radius-30"> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
