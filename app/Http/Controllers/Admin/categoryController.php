<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\attribute;
use App\Models\category;
use App\Models\categoryAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Correct Validator facade
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    // Resolve method conflict by aliasing
    use ApiResponse, SaveFile {
        ApiResponse::error insteadof SaveFile;
        SaveFile::error as saveFileError;
    }

    /**
     * Display a listing of the resource.
     */
    public function index_category_name()
    {
        $data = category::get();
        return view('admin.Category.category', get_defined_vars());
    }

    /**
     * Store or update a category.
     */
    public function store_category_name(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($validation->fails()) {
            // Use the ApiResponse trait's error method
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $imageName = '';
            if ($request->id > 0) {
                $category = category::find($request->id);
                $imageName = $category->image;
                $imageName = $this->saveImage($request->image, $imageName, 'images/categories');
            } else {
                $imageName = $this->saveImage($request->image, '', 'images/categories');
            }
            if($request->parent_category_id != 0){
                category::updateOrCreate(
                    ['id' => $request->post('id')],
                    [
                        'name' => $request->name,
                        'slug' => $request->slug,
                        'image' => $imageName,
                        'parent_category_id' => $request->parent_category_id,
                    ]
                );
            }else{
                category::updateOrCreate(
                    ['id' => $request->post('id')],
                    [
                        'name' => $request->name,
                        'slug' => $request->slug,
                        'image' => $imageName,
                    ]
                );
            }


            return $this->success(['reload' => true], 'Successfully Submitted');
        }
    }


    public function index_category_attribute()
    {
        $data = categoryAttribute::with('category','attribute')->get();
        $category = category::get();
        $attribute = attribute::get();
        return view('admin.Category.category_attribute', get_defined_vars());
    }


    public function store_category_attribute(Request $request)
{
    $validation = Validator::make($request->all(), [
        'attribute_id' => 'required|exists:attributes,id',
        'category_id' => 'required|exists:categories,id',
    ]);

    if ($validation->fails()) {
        return $this->error($validation->errors()->first(), 400, []);
    } else {
        categoryAttribute::updateOrCreate(
            ['id' => $request->post('id')],
            [
                'attribute_id' => $request->attribute_id, // Corrected key
                'category_id' => $request->category_id,
            ]
        );

        return $this->success(['reload' => true], 'Successfully Submitted');
    }
}

}
