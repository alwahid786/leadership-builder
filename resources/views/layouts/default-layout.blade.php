<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Leadership Builder</title>

    @include('includes.header')
    <style>
        @keyframes ldio-x2uulkbinbj {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .loadingio-spinner-rolling-nq4q5u6dq7r {
            width: 100%;
            height: 100%;
            display: inline-block;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.37) ;
            /* No background to make it transparent */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Ensure the loader is above other elements */
        }

        .ldio-x2uulkbinbj {
            width: 100%;
            height: 100%;
            position: relative;
            transform: translateZ(0) scale(1);
            backface-visibility: hidden;
            transform-origin: 0 0;
        }

        .ldio-x2uulkbinbj div {
            position: absolute;
            width: 60px;
            height: 60px;
            border: 6.9px solid var(--blue);
            border-top-color: transparent;
            border-radius: 50%;
            animation: ldio-x2uulkbinbj 0.819672131147541s linear infinite;
            top: 50%;
            /* Center the div */
            left: 50%;
            /* Center the div */
            transform: translate(-50%, -50%);
            /* Center the div */
            box-sizing: content-box;
        }
    </style>
</head>

<body>
    <div id="loader" class="loadingio-spinner-rolling-nq4q5u6dq7r">
        <div class="ldio-x2uulkbinbj">
            <div></div>
        </div>
    </div>
    @yield('content')
    @include('includes.footer')
</body>

</html>