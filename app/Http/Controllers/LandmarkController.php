<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Illuminate\Support\HtmlString;

class LandmarkController extends Controller
{


    public function show(){
        return view('landmark');
    }

    public function detect(Request $request){

        $validated = $request->validate([
            'image' => 'required',
        ]);

        try {
            $imageAnnotator = new ImageAnnotatorClient([
                'credentials' => base_path('fusion-diagnostics-6fdc409de2f7.json')
            ]);

            # Set img request in var
            $image = $request->file('image');

            # annotate the image
            $image_contents = file_get_contents($image);
            $response = $imageAnnotator->landmarkDetection($image_contents);
            $landmarks = $response->getLandmarkAnnotations();

            $number_landmarks = count($landmarks);
            $landmark_content = '';

            foreach ($landmarks as $landmark) {
                $landmark_content .= "{$landmark->getDescription()}";
            }
            $formatted_landmark = new HtmlString($landmark_content);

            //  Upload image & Create name img
            $file_extention = $image -> getClientOriginalExtension();
            $file_name = time() . "." . $file_extention;   // name => 3628.png
            $image -> move( "uploads" , $file_name );
            $img_path = "uploads/". $file_name;

            return view("landmark", compact('number_landmarks', 'formatted_landmark', 'img_path'));

        } catch (Exception $e) {
            return $e->getMessage();
        }

        $imageAnnotator->close();
    }

}
