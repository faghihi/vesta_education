<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>User input</h2>
    <a href="{{URL::route('test')}}">create user</a>
    <form action="{{URL::route('teststore')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="image">Select image to upload:</label>
            {{--<input type="file" class="form-control" id="image" name="Image">--}}
            <input type="file" name="image" id="fileToUpload">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="Password">
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</div>

</body>
</html>
