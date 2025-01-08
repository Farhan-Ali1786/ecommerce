<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Correct Validator facade
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Support\Facades\DB;

class taxController extends Controller
{
    use ApiResponse, SaveFile {
        ApiResponse::error insteadof SaveFile;
        SaveFile::error as saveFileError;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tax::get();
        return view('admin.Tax.tax', get_defined_vars());
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
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'text' => 'required|string|max:255',

        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {

            tax::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' => $request->text,
                ]
            );
        }

        return $this->success(['reload' => true], 'Successfully Submitted');
    }

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
