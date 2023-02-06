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

            # Store Image
            $image = $request->file('image');
            $path = $image->store('landmarks');

            # annotate the image
            $image_contents = file_get_contents(storage_path("app/{$path}"));
            $response = $imageAnnotator->landmarkDetection($image_contents);
            $landmarks = $response->getLandmarkAnnotations();

            $number_landmarks = count($landmarks);
            $landmark_content = '';

            foreach ($landmarks as $landmark) {
                $landmark_content .= "{$landmark->getDescription()}";
            }

            $formatted_landmark = new HtmlString($landmark_content);

            return view("landmark", compact('number_landmarks', 'formatted_landmark', 'path'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
        $imageAnnotator->close();
    }

}
