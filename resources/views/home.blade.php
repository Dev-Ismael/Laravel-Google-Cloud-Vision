@extends('layouts.app')

@section('content')


    <div class="container mt-5">

        <h1 class="text-center">Google Cluod Vision!</h1>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card" >
                    <div class="card-body">
                      <h5 class="card-title"> Landmarks </h5>
                      <a href="/landmark" class="btn btn-primary">Try It</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title"> Content Text </h5>
                        <a href="/content" class="btn btn-primary">Try It</a>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection
