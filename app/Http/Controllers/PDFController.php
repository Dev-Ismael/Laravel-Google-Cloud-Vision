<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\HtmlString;
use Illuminate\Http\Request;
use Exception;

class PDFController extends Controller
{


    public function show(){
        return view('pdf');
    }



    public function detect(Request $request){

        $validated = $request->validate([
            'pdf' => ['required' , 'mimes:pdf' , 'max:2048'],
        ]);

        try {

            $imageAnnotator = new ImageAnnotatorClient([
                'credentials' => base_path('fusion-diagnostics-6fdc409de2f7.json')
            ]);

            # Store Image
            $pdf = $request->file('pdf');

            # extract images from pdf
            $pdf = new Pdf($pdf->getRealPath());
            $images = $pdf->saveAllPages();

            $text_content = '';

            # annotate each image
            foreach ($images as $image) {
                $image_contents = file_get_contents($image);
                $response = $imageAnnotator->textDetection($image_contents);
                $texts = $response->getTextAnnotations();

                foreach ($texts as $text) {
                    $text_content .= "{$text->getDescription()}";
                }
            }

            $formatted_text = new HtmlString($text_content);

            return $formatted_text;


            // return view("content", compact('number_texts', 'formatted_text'));

        } catch (Exception $e) {
            return $e->getMessage();
        }

        $imageAnnotator->close();

    }

}
