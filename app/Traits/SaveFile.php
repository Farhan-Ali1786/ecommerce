<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

trait SaveFile
{
    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function saveImage($file, $previousImagePath = '', $path = '')
    {
        if ($previousImagePath != '') {

            $image_path = $previousImagePath;
            if (file::exists($image_path)) {
                file::delete($image_path);
            }
        }

        if ($path == '') {
            $image_name = time() . '.' . $file->extension();
            $file->move(public_path('images/'), $image_name);
        } else {
            $image_name = ''.$path.'/'.time() . '.' . $file->extension();
            $file->move(public_path(''.$path.''), $image_name);
        }

        return $image_name;
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error(string $message = null, int $code, $data = null)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
