<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Correct Validator facade
use App\Traits\ApiResponse;

class ProfileController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . Auth::user()->id,
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:5120',
            'address' => 'required|string|max:255',
            'twitter_link' => 'string|max:255',
            'fb_link' => 'nullable|string|max:255',
            'insta_link' => 'nullable|string|max:255',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
            // return response()->json(['status' => 400, 'message' => $validation->errors()->first()]);
        } else {
            $image_name = Auth::user()->image; // Default to current user's image
            if ($request->hasFile('image')) {
                $image_name = 'images/' . $request->name . '_' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $image_name);
            } else {
                $image_name = Auth::user()->image;
            }

            $user = User::updateOrCreate(
                ['id' => Auth::user()->id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'image' => $image_name,
                    'twitter_link' => $request->twitter_link,
                    'fb_link' => $request->fb_link,
                    'insta_link' => $request->insta_link,
                ]
            );
            // return response()->json(['status' => 200, 'message' => 'Successfully Submitted']);
            return $this->success([], 'Successfully Submitted');
        }
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
