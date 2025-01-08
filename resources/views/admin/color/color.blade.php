@extends("admin.layout")
@section("content")

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Home Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.manage_color') }}" id="formSubmit" method="post"
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
                                            <label for="enter_value" class="col-sm-3 col-form-label">Hex Code</label>
                                            <div class="col-sm-1">
                                                <input type="color" id="color_picker" class="form-control form-control-color" title="Choose your color">
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="value" class="form-control" id="enter_value" placeholder="Enter Value">
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
                <div class="breadcrumb-title pe-3"> Color</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> Color</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn btn-outline-info  radius-30" onclick="saveData('','','')"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">Add Color</button>
                </div>
            </div>


            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Text</th>
                                    <th>Color</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td>{{ $item->text }}</td>
                                        <td class="box_color" style="background-color:{{ $item->value }}"></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <button type="button"
                                                onclick="saveData('{{ $item->id }}','{{ $item->text }}','{{ $item->value }}')"
                                                class="btn btn-outline-info  radius-30" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update</button>

                                            <button onclick="deleteData('{{ $item->id }}','colors')"
                                                class="btn btn-outline-danger  radius-30"> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>

                                    <th>Text</th>
                                    <th>Color</th>
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
        function saveData(id, text,value) {
            $('#enter_id').val(id);
            $('#enter_text').val(text);
            $('#enter_value').val(value);
        }
    </script>
    <script>
        const colorPicker = document.getElementById('color_picker');
        const hexInput = document.getElementById('enter_value');

        // Update the text input when a color is selected
        colorPicker.addEventListener('input', function () {
            hexInput.value = colorPicker.value;
        });
    </script>
@endsection
