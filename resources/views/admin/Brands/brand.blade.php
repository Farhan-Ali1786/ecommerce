@extends('admin.layout')
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Brands</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.brands') }}" id="formSubmit" method="post"
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
                                                <label for="enter_text" class="col-sm-3 col-form-label">Text</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="text" class="form-control"
                                                        id="enter_text" placeholder="Enter some Text">
                                                </div>
                                            </div>



                                            <div class="row mb-3">
                                                <label for="enter_image" class="col-sm-3 col-form-label">image</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="image" class="form-control"
                                                        id="enter_image">
                                                </div>
                                                <div id="image_key">
                                                    <img src="" height="200px" width="200px" alt=""
                                                        id="image">
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
                <div class="breadcrumb-title pe-3">Brands</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Brands</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn btn-outline-info  radius-30" onclick="saveData('','','')"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Add Brand</button>
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
                                    <th>Text</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        {{-- <td>
                                            {{ $item->image }}
                                        </td> --}}
                                        <td>
                                            <img src="{{ asset('/') }}/{{ $item->image }}" alt="Image"
                                                style="width: 100px; height: auto;">
                                        </td>
                                        <td>{{ $item->text }}</td>

                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <button type="button"
                                                onclick="saveData('{{ $item->id }}', '{{ $item->text }}', '{{ $item->image ?? '' }}')"
                                                class="btn btn-outline-info radius-30" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>

                                            <button onclick="deleteData('{{ $item->id }}','categories')"
                                                class="btn btn-outline-danger  radius-30"> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Text</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
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


function saveData(id, text, image) {
    $('#enter_id').val(id);
    $('#enter_text').val(text);

    // Determine the image URL
    let key_image;
    if (image === '' || image === null) {
        key_image = "{{ URL::asset('images/1735312436.jpg') }}";
    } else {
        key_image = "{{ URL::asset('/') }}/" + image;
    }

    // Update the image preview
    const html = '<img src="' + key_image + '" name="image" height="200px" width="200px" alt="" id="showImage">';
    $('#image_key').html(html);
}

    </script>
@endsection
