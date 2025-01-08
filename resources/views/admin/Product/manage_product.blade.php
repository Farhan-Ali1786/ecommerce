@extends('admin.layout')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

@section('content')
    <style>
        .multi-select-container {
            display: inline-block;
            position: relative;
        }

        .multi-select-menu {
            position: absolute;
            left: 0;
            top: 0.8em;
            float: left;
            min-width: 100%;
            background: #fff;
            margin: 1em 0;
            padding: 0.4em 0;
            border: 1px solid #aaa;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            display: none;
        }

        .multi-select-menu input {
            margin-right: 0.3em;
            vertical-align: 0.1em;
        }

        .multi-select-button {
            display: inline-block;
            font-size: 0.875em;
            padding: 0.2em 0.6em;
            max-width: 20em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: -0.5em;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            cursor: default;
        }

        .multi-select-button:after {
            content: "";
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0.4em 0.4em 0 0.4em;
            border-color: #999 transparent transparent transparent;
            margin-left: 0.4em;
            vertical-align: 0.1em;
        }

        .multi-select-container--open .multi-select-menu {
            display: block;
        }

        .multi-select-container--open .multi-select-button:after {
            border-width: 0 0.4em 0.4em 0.4em;
            border-color: transparent transparent #999 transparent;
        }
    </style>
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Product</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Form Product</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <!--end row-->
            <div class="row">
                <div class="col-xl-9 mx-auto">

                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bx-store-alt me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Add Product</h5>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" value="{{ $data->name }}"
                                            class="form-control" id="inputEnterYourName" placeholder="Enter Product Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Product Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="slug" value="{{ $data->slug }}"
                                            class="form-control" id="inputPhoneNo2" placeholder="slug">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Product image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" value="{{ $data->image }}"
                                            class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Item Code</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="item_code" value="{{ $data->item_code }}"
                                            class="form-control" id="inputChoosePassword2" placeholder="Item Code">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">keywords</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="keywords" value="{{ $data->keywords }}"
                                            class="form-control" id="inputConfirmPassword2" placeholder="keywords">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="attributes_id" class="col-sm-3 col-form-label">Category
                                        Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="category" id="category"
                                            aria-label="Default select example">
                                            <option value="" disabled selected>Select a Category</option>
                                            @foreach ($category as $categories)
                                                @if ($data->category_id == $categories->id)
                                                    <option selected value="{{ $categories->id }}">{{ $categories->name }}
                                                        ({{ $categories->slug }})
                                                    </option>
                                                @else
                                                    <option value="{{ $categories->id }}">{{ $categories->name }}
                                                        ({{ $categories->slug }})
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAddress4" class="col-sm-3 col-form-label">Attribute</label>
                                    <div class="col-sm-9">
                                        <form class=" form-control">
                                            <span id="multiAttr"></span>
                                            {{-- <select   id="attribute_id" name="attribute_id" multiple>

                                            </select> --}}
                                        </form>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="attributes_id" class="col-sm-3 col-form-label">Tax</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="tax" id="tax"
                                            aria-label="Default select example">
                                            @foreach ($tax as $taxes)
                                                @if ($data->tax_id == $taxes->id)
                                                    <option selected value="{{ $taxes->id }}">
                                                        {{ $taxes->text }}%</option>
                                                @else
                                                    <option value="{{ $taxes->id }}">
                                                        {{ $taxes->text }}%</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="attributes_id" class="col-sm-3 col-form-label">Brand</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="attributes_id" id="attributes_id"
                                            aria-label="Default select example">
                                            @foreach ($brand as $brands)
                                                @if ($data->brand_id == $brands->id)
                                                    <option selected value="{{ $brands->id }}">{{ $brands->text }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brands->id }}">{{ $brands->text }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAddress4" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description">
                                            {{ $data->description }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAddress4" class="col-sm-3 col-form-label">Product Attributes</label>
                                    <div class="row col-sm-9">

                                        <div class="col-sm-3">
                                            <button type="button" id="addAttributeButton"
                                                class="btn btn-info w-100 p-1 mx-0 mb-3">Add
                                                Attribute</button>
                                        </div>

                                        <div class="row" id="addAttr">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="color_id[]" id="color_id"
                                                        aria-label="Default select example">
                                                        @foreach ($color as $colors)
                                                            <option class="box_color"
                                                                style="background-color: {{ $colors->value }}"
                                                                value="{{ $colors->id }}">
                                                                {{ $colors->text }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <select class="form-control" name="size_id[]" id="size_id"
                                                        aria-label="Default select example">
                                                        @foreach ($size as $sizes)
                                                            <option class="box_size" value="{{ $sizes->id }}">
                                                                {{ $sizes->text }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" name="sku[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="SKU">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" name="mrp[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="MRP">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="number" name="price[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="Price">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="number" name="qty[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="Quantity">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" name="lenght[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="Lenght">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" name="height[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="Height">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" name="breadth[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="Breadth">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" name="weight[]" class="form-control"
                                                        id="inputConfirmPassword2" placeholder="Weight">
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-sm-3">
                                                        <button type="button" id="addAttrImages"
                                                            class="btn btn-info w-100 p-1 mx-0 mb-3">Add Image</button>
                                                    </div>
                                                    <div class="col-sm-9 mb-3">
                                                        <div class="row" id="attrImage">
                                                            <input type="file" name="attr_image[]"
                                                                class="form-control" placeholder="Image 1">
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-info w-100">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>

    <script>
        // Initialize CKEditor
        document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('description');
        });
    </script>

    <script>
        $('#addAttributeButton').click(function(e) {
            var html = '';
            var sizeData = $('#size_id').html();
            var colorData = $('#color_id').html();
            html +=
                '<div class="col-sm-3"> <select class = "form-control" name = "color"id = "color_id" aria-label = "Default select example" >' +
                colorData + '</select></div>';
            html +=
                '<div class = "col-sm-3" ><select class = "form-control" name = "size"id = "color" aria - label = "Default select example" >' +
                sizeData + '</select> </div>';
            html +=
                '<div class="col-sm-3 mb-3"> <input type="text" name="sku[]" class="form-control" id="inputConfirmPassword2" placeholder="SKU"></div>';
            html +=
                '<div class="col-sm-3 mb-3"><input type="text" name="mrp[]" class="form-control" id="inputConfirmPassword2" placeholder="MRP"></div>';
            html +=
                '<div class="col-sm-3 mb-3"><input type="number" name="price[]" class="form-control"id="inputConfirmPassword2" placeholder="Price"></div>';
            html +=
                '<div class="col-sm-3 mb-3"><input type="number" name="qty[]" class="form-control" id="inputConfirmPassword2" placeholder="Quantity"></div>';
            html +=
                '<div class="col-sm-3 mb-3"><input type="text" name="lenght[]" class="form-control" id="inputConfirmPassword2" placeholder="Lenght"></div>';
            html +=
                '<div class="col-sm-3 mb-3"><input type="text" name="height[]" class="form-control" id="inputConfirmPassword2" placeholder="Height"></div>';
            html +=
                '<div class="col-sm-3 mb-3"><input type="text" name="breadth[]" class="form-control" id="inputConfirmPassword2" placeholder="Breadth"></div>';
            html +=
                '<div class="col-sm-3 mb-3"><input type="text" name="weight[]" class="form-control" id="inputConfirmPassword2" placeholder="Weight"></div>';
            $('#addAttr').append(html);
        });
    </script>



    <script>
        $("#category").change(function(e) {
            var category_id = $('#category').val();
            var url = "{{ route('add.getAttribute') }}";
            let html = ''; // Initialize html variable
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token from meta tag
                },
                type: 'POST',
                data: {
                    'category_id': category_id
                },
                success: function(result) {
                    if (result.status == 'Success') {
                        html +=
                            '<select class="form-control" id="attribute_id" name="attribute_id" multiple>';

                        // Loop through the first item in result.data
                        jQuery.each(result.data[0].values, function(attrKey, attrVal) {
                            html += '<option value="' + attrVal.id + '">' + result.data[0]
                                .attribute.name + ' ' + attrVal.value + '</option>';
                        });

                        html += '</select>';

                        // Append the HTML to #multiAttr
                        $('#multiAttr').html(html);

                        // Initialize multiSelect (only if multiSelect plugin is required)
                        $('#attribute_id').multiSelect();

                        console.log(html); // To see the generated HTML

                    } else {
                        showAlert(result.status, result.message);
                    }
                },
                error: function(result) {
                    showAlert(result.responseJSON.status, result.responseJSON.message);
                }
            });
        }); 
    </script>
    <script>
        $(document).ready(function() {
            // When the "Add Image" button is clicked
            $('#addAttrImages').click(function() {
                // Create a new file input field
                var newInput = $(
                    '<div class="col-sm-12 my-3"><input type="file" name="image[]" class="form-control" placeholder="Image"></div>'
                );

                // Append the new input field to the image inputs container
                $('#attrImage').append(newInput);
            });
        });
    </script>
@endsection
