<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            margin-top: 100px;
        }

        h1 {
            font-size: 36px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Page Not Found</h1>
        <p>The requested page could not be found.</p>
       <a href="{{route('homepage')}}"> <button class="ps-btn ps-btn--warning">Go To Homepage</button></a>
    </div>
</body>
</html>
