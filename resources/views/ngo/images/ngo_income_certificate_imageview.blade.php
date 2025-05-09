<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Doctor Clinic</title>
    <link rel="shortcut icon" href="/asset_pages/img/fev.png" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        div.container-fluid{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
           <div class="col-12 d-flex justify-content-center">
    @switch($type)
        @case(0)
            <iframe src="{{ asset('uploads/' . $ngo->income) }}"  frameborder="0"></iframe>
            @break
        @case(1)
            <iframe src="{{ asset('uploads/' . $ngo->adhar_card) }}"  frameborder="0"></iframe>
            @break
        @case(2)
            <iframe src="{{ asset('uploads/' . $ngo->place_img) }}"  frameborder="0"></iframe>
            @break
        @case(3)
            <iframe src="{{ asset('uploads/' . $ngo->pradhan_verification) }}" frameborder="0"></iframe>
            @break
        @case(4)
            <iframe src="{{ asset('uploads/' . $ngo->year_amount) }}"  frameborder="0"></iframe>
            @break
        @default
            <div>
                <p>No data available</p>
            </div>
    @endswitch
</div>

            
            <div class="col-12 d-flex justify-content-center pt-3">
                <a href="/ngo/ngo_register" class="btn btn-warning" id="backbutton">Back</a>
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        $('#backbutton').click(function() {
            window.close();   
        });
    </script>
</body>
</html>
