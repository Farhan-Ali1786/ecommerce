<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\category;
use App\Models\categoryAttribute;
use App\Models\color;
use App\Models\product;
use App\Models\productAttr;
use App\Models\productAttrImages;
use App\Models\size;
use App\Models\tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Correct Validator facade
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    // Resolve method conflict by aliasing
    use ApiResponse, SaveFile {
        ApiResponse::error insteadof SaveFile;
        SaveFile::error as saveFileError;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = product::get();
        return view('admin.Product.product', get_defined_vars());
    }
    public function view_product($id = 0)
    {
        if ($id == 0) {
            // New Product
            $data = new product();
            $product_attr = new productAttr();
            $product_attr_image = new productAttrImages();
            $category = category::get();
            $color = color::get();
            $tax = tax::get();
            $size = size::get();
            $brand = Brand::get();

        } else {
            // Update product
            $data['id'] = $id;
            $validation = Validator::make($data, [
                'id' => 'required|exists:products,id',
            ]);

            if ($validation->fails()) {
                return redirect()->back();
            } else {
                $data = product::where('id', $id)->first();

            }
        }
        return view('admin.Product.manage_product',get_defined_vars());
        prx(get_defined_vars());
    }

    /**
     * Store or update a category.
     */
    public function store(Request $request)
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
            if ($request->parent_category_id != 0) {
                category::updateOrCreate(
                    ['id' => $request->post('id')],
                    [
                        'name' => $request->name,
                        'slug' => $request->slug,
                        'image' => $imageName,
                        'parent_category_id' => $request->parent_category_id,
                    ]
                );
            } else {
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
    public function getAttribute(Request $request)
    {
        $category_id = $request->category_id;

        // Fetch category attributes along with their related values
        $data = CategoryAttribute::where('category_id', $category_id)
            ->with('attribute', 'values')
            ->get();

        // Return data in the expected format
        return $this->success($data, 'Successfully Submitted');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
