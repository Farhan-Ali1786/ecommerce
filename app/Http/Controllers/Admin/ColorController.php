<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Correct Validator facade
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;
class ColorController extends Controller
{
    use ApiResponse;


    public function index()
    {
        $data = color::get();
        return view('admin.color.color', get_defined_vars());
    }
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'text' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {

            color::updateOrCreate(
                ['id' => $request->post('id')],
                [
                    'text' => $request->text,
                    'value' => $request->value,
                ]
            );
            return $this->success(['reload' => true], 'Successfully Submitted');
        }
    }
}
