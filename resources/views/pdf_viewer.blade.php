<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Application</title>
    <style>
        body {
            overflow: hidden;
            padding: 0;
            margin: 0;
            display: 0;
        }

        iframe {
            width: 100vw;
            height: 100vh;
            display: block;
            border: 0;
        }
    </style>
</head>

<body>
    <iframe src="{{ $filepath }}"></iframe>
</body>



</html>
