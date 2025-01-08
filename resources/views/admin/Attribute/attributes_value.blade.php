@extends('admin.layout')
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attributes Value</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.attributes_value') }}" id="formSubmit" method="post"
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
                                                <label for="attributes_id" class="col-sm-3 col-form-label">Attribute
                                                    Name</label>
                                                <div class="col-sm-9">


                                                    <select class="form-control" name="attributes_id" id="attributes_id" aria-label="Default select example">
                                                    
                                                        @foreach ($attribute as $attributes)
                                                            <option value="{{ $attributes->id }}">
                                                                {{ $attributes->name }}({{ $attributes->slug }}) </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="enter_value" class="col-sm-3 col-form-label">Attribute Value</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="value" class="form-control" id="enter_value"
                                                        placeholder="Enter some slug">
                                                </div>
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
                <div class="breadcrumb-title pe-3">Attributes Value</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Attributes Value</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn btn-outline-info  radius-30" onclick="saveData('','','')"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Add Attributes Value</button>
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
                                    <th>Attributes Name</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td>{{ $item->singleAttribute->name }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>
                                            <button type="button"
                                                onclick="saveData('{{ $item->id }}', '{{ $item->attributes_id }}', '{{ $item->value }}')"
                                                class="btn btn-outline-info radius-30" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>


                                            <button onclick="deleteData('{{ $item->id }}','attribute_values')"
                                                class="btn btn-outline-danger  radius-30"> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Attributes Name</th>
                                    <th>Value</th>
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
        function saveData(id, attributes_id, value) {
            $('#enter_id').val(id);
            $('#attributes_id').val(attributes_id);
            $('#enter_value').val(value);
        }
    </script>
@endsection
