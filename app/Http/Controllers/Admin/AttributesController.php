<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\attribute;
use App\Models\attributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Correct Validator facade
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;
class AttributesController extends Controller
{
    use ApiResponse;



    public function index_attributes_name()
    {
        $data = attribute::get();
        return view('admin.Attribute.attribute', get_defined_vars());
    }
    public function store_attributes_name(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {

            attribute::updateOrCreate(
                ['id' => $request->post('id')],
                [
                    'name' => $request->name,
                    'slug' => $request->slug,
                ]
            );
            return $this->success(['reload' => true], 'Successfully Submitted');
        }
    }

// Attributes Value
    public function index_attributes_value()
    {
        $data = attributeValue::with('singleAttribute')->get();

        $attribute = attribute::get();
        return view('admin.Attribute.attributes_value', get_defined_vars());
    }


    public function store_attributes_value(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'attributes_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {

            attributeValue::updateOrCreate(
                ['id' => $request->post('id')],
                [
                    'attributes_id' => $request->attributes_id,
                    'value' => $request->value,
                ]
            );
            return $this->success(['reload' => true], 'Successfully Submitted');
        }
    }
}
