<?php

namespace App\Http\Controllers;

use App\Inspiration;
use Illuminate\Http\Request;

class InspirationController extends Controller
{
    public function create(request $request, $image_info) {
        $saveData = [
            "image_info" => $image_info,
            "image_url" => $request->image_url,
            "project_id" => 1
        ];
        $inspiration = Inspiration::create($saveData);

        return back();
    }

    public function destroy($image_info) {
        $inspiration = Inspiration::where('image_info', $image_info);

        $inspiration->delete();

        return back();
    }

    public function project() {
        return $this->belongsTo('App\Project');
    }
}
