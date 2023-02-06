<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Illuminate\Support\HtmlString;

class UserController extends Controller
{


    public function show(){
        return view('show');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'image' => 'required',
        ]);

        // putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('fusion-diagnostics-6fdc409de2f7.json'));

        try {

            $imageAnnotator = new ImageAnnotatorClient([
                //we can also keep the details of the google cloud json file in an env and read it as an object here
                'credentials' => base_path('fusion-diagnostics-6fdc409de2f7.json')
            ]);

            # annotate the image
            $image = file_get_contents($request->file("image"));
            $response = $imageAnnotator->landmarkDetection($image);
            $landmarks = $response->getLandmarkAnnotations();

            $number_landmarks = count($landmarks);
            $landmark_content = '';

            printf('%d landmark found:' . PHP_EOL, count($landmarks));
            foreach ($landmarks as $landmark) {
                $landmark_content .= "{$landmark->getDescription()}";
                print($landmark->getDescription() . PHP_EOL);
            }


            $formatted_landmark = new HtmlString($landmark_content);

            return "Landmark detection successful!!! Number of Landmarks:  $number_landmarks Formatted Landmark found on image uploaded: $formatted_landmark";

            // return redirect()->route('home')
                // ->with('success', "Landmark detection successful!!! Number of Landmarks:  $number_landmarks Formatted Landmark found on image uploaded: $formatted_landmark");
        } catch (Exception $e) {
            return $e->getMessage();
        }
        $imageAnnotator->close();

    }

}
