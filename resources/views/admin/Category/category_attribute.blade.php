@extends('admin.layout')
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.category_attribute') }}" id="formSubmit" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 mx-auto">

                                <div class="card border-top border-0 border-4 border-info">
                                    <div class="card-body">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">

                                            </div>
                                            <hr />

                                            <div class="row mb-3">
                                                <label for="attributes_id" class="col-sm-3 col-form-label"> category
                                                    </label>
                                                <div class="col-sm-9">


                                                    <select class="form-control" name="category_id"
                                                        id="category_id" aria-label="Default select example">
                                                        <option value="0">Selete Category </option>
                                                        @foreach ($category as $categories)
                                                            <option value="{{ $categories->id }}">
                                                                {{ $categories->name }}({{ $categories->slug }}) </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="attributes_id" class="col-sm-3 col-form-label">Attribute
                                                    id</label>
                                                <div class="col-sm-9">


                                                    <select class="form-control" name="attribute_id"
                                                        id="attribute_id" aria-label="Default select example">
                                                        <option value="0">Selete Attribute </option>
                                                        @foreach ($attribute as $attributes)
                                                            <option value="{{ $attributes->id }}">
                                                                {{ $attributes->name }}({{ $attributes->slug }}) </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="enter_id">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <span id="submitButton">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Category Attribute</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category Attribute</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn btn-outline-info  radius-30" onclick="saveData('','','')"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category Attribute</button>
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
                                    <th>Category</th>
                                    <th>Attribute</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->attribute->name }}</td>

                                        <td>
                                            <button type="button"
                                                onclick="saveData('{{ $item->id }}', '{{ $item->category_id }}', '{{ $item->attribute_id }}')"
                                                class="btn btn-outline-info radius-30" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>

                                            <button onclick="deleteData('{{ $item->id }}','category_attribute')"
                                                class="btn btn-outline-danger  radius-30"> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Attribute</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


        function saveData(id, category_id, attribute_id) {


            $('#enter_id').val(id);
            $('#category_id').val(category_id);
            $('#attribute_id').val(attribute_id);



        }
    </script>
@endsection
