<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div style="height: 100vh" class='bg-gray p-5'>
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-sm-12 col-md-7 col-lg-6 col-xl-6 text-center p-4">
                    <form action="{{ route('print') }}" method="post">
                        @csrf
                        <input style="display: none;" name="id" type="text" value="{{ $id }}">
                        <input style="display: none;" name="serviceName" type="text" value="{{ $serviceName }}">

                        <div class="d-flex justify-content-center align-content-center">
                            <img height="200px" width="200px" src="{{ asset('storage/Images/checked.png') }}" alt="Checked Image">
                        </div>
                        <div class="mt-3">
                            <h1>Thank you</h1>
                            <p>Thank you for choosing our service! You will receive a token ticket shortly. Please wait until your name is called to be served. We appreciate your patience and look forward to assisting you.</p>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary col-5">Print ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
