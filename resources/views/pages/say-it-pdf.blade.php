<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .coverImg {
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .coverImg img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .divOutline {
            display: flex;
            align-items: baseline;
        }
    </style>
</head>

<body>
    @if(isset($book['inspiration']) && $book['inspiration'] != '')
    <div class="inspiration-content" style="page-break-before: always;">
        <h3 class="text-center">How Will You Say It?</h3>
        {!! $book['inspiration']!!}
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>