<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Form &ndash; Kraken</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 40px;
            padding-bottom: 80px;
        }
        .header {
            margin-bottom: 40px;
        }
    </style>

</head>
<body>

    <section class="header container">
        <h1>Preview form</h1>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-6">
                @include('forms.bootstrap.show')
            </div>
        </div>
    </section>

    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>