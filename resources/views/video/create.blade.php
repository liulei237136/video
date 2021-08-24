<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/videos" method="POST">
    @csrf
    <div>
        <input type="text" name="title" placeholder="input the video title" required>
    </div>
    <div>
        <input type="file" name="video" required>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>
