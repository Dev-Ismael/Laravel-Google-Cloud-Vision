@extends('layouts.app')

@section('content')


    <div class="container mt-5">

        <h1 class="text-center">Detect text!</h1>
        <form action="/content/detect" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-center">
                <input class="form-control" type="file" name="image">
                <button type="submit" class=" btn btn-primary mt-2">Convert</button>
            </div>
        </form>

        @if ( isset($number_texts) && isset($formatted_text) )

            <h1 class="text-center mt-5 pt-5">Results</h1>
            <div class="row h-100 d-flex align-items-center justify-content-center mb-5">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa-solid fa-image"></i> Text Content
                                </td>
                                <td style="word-break: break-word;"> {{ $formatted_text }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset($img_path) }}" class="rounded img-fluid" alt="uploaded-image">
                </div>
            </div>
        @endif



    </div>




@endsection
