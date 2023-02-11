<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Illuminate\Support\HtmlString;

class ContentController extends Controller
{


    public function show(){
        return view('content');
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

            # annotate the image
            $image_contents = file_get_contents($image);
            $response = $imageAnnotator->textDetection($image_contents);
            $texts = $response->getTextAnnotations();

            $number_texts = count($texts);
            $text_content = '';

            foreach ($texts as $text) {
                $text_content .= "{$text->getDescription()}";
            }

            $formatted_text = new HtmlString($text_content);


            return view("content", compact('number_texts', 'formatted_text'));

        } catch (Exception $e) {
            return $e->getMessage();
        }

        $imageAnnotator->close();

    }

}
