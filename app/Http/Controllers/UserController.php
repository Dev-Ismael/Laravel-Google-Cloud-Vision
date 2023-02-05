<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class UserController extends Controller
{


    public function show(){
        return view('show');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->textDetection($image->path());
        $text = $response[0]->getDescription();

        return $text;

    }

}
