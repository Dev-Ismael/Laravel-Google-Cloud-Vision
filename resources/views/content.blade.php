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

            <h2 class="text-center mt-5">Results</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa-solid fa-image"></i> Text Content
                                </td>
                                <td> {{ $formatted_text }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div class="col-md-4">
                    <img src="{{ asset('storage/'.$path) }}" class="img-fluid" alt="Image">
                </div> --}}
            </div>
        @endif



    </div>




@endsection
