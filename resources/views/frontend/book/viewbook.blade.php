{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <embed src="{{ asset('storage/' . $bookfile->bookfile) }}" type="application/pdf" width="100%" height="800px">
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>PDF.js Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <iframe src="{{ asset('storage/' . $bookfile->bookfile) }}" width="100%" height="1000"
                    style="border: none"></iframe>
            </div>
        </div>
    </div>
</body>

</html>
