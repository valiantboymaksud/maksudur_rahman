<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Validate IP Address</title>
</head>

<body>
    <div class="container">
        <h1>Validate IP Address</h1>

        <div class="col-sm-6">
            <form action="" method="GET">
                <div class="form-floating mb-3">
                    <input type="text" name="ip_address" value="{{ request('ip_address') }}" class="form-control"
                        id="floatingInput" placeholder="192.168.0.1">
                    <label for="floatingInput">IP Address</label>
                </div>
                <button class="btn btn-sm btn-outline-success" type="submit">Submit</button>
            </form>
        </div>
        <div class="col-sm-6">
            @if (request()->filled('ip_address'))
                <h1>Excepted Output:</h1>
                {{ request('ip_address') }} is {{ $validate_ip ? 'Validate' : 'Invalid' }}
            @endif
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
