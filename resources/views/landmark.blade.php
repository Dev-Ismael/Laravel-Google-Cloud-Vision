<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Landmarks Detect</title>
    <style>
        body{
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center">Detect Landmarks!</h1>
        <form action="/landmark/detect" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-center">
                <input class="form-control" type="file" name="image">
                <button type="submit" class=" btn btn-primary mt-2">Convert</button>
            </div>
        </form>

        @if ( isset($number_landmarks) && isset($formatted_landmark) )

            <h2 class="text-center mt-5">Results</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <table class="table table-bordered ">
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
                                <td> {{ $formatted_landmark }} </td>
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




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
