<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Episodes</title>
</head>
<body>
    <h1>Episodes</h1>
    <ul>
        @foreach ($episodes as $episode)
        <li>{{$episode->name}}</li>
        @endforeach
    </ul>


</body>
</html>