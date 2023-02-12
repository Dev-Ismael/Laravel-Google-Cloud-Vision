@extends('layouts.app')

@section('content')


    <div class="container mt-5">

        <h1 class="text-center">Detect Landmarks!</h1>
        <form action="/landmark/detect" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-center">
                <input class="form-control  @error('image') is-invalid @enderror" type="file" name="image">
                @error('image')
                    <p class="form-text text-start text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class=" btn btn-primary mt-2">Convert</button>
            </div>
        </form>

        @if ( isset($number_landmarks) && isset($formatted_landmark) )
            <h1 class="text-center mt-5 pt-5">Results</h1>
            <div class="row h-100 d-flex align-items-center justify-content-center mb-5">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa-solid fa-hashtag"></i> Number Of Landmarks
                                </td>
                                <td> {{ $number_landmarks }} </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa-solid fa-image"></i> Landmarks Forrmatted
                                </td>
                                <td style="word-break: break-word;"> {{ $formatted_landmark }} </td>
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
