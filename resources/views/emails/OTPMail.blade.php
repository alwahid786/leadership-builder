<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OTP Code Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            color: #555;
            font-size: 24px;
            font-weight: normal;
            margin-top: 0;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
            margin-top: 0;
        }

        .otp-code {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .otp-code p {
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .otp-code h2 {
            font-size: 32px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 0;
            color: #6dabe4;
        }

        .otp-code h3 {
            font-size: 16px;
            font-weight: normal;
            margin-top: 0;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="otp-code">
        <p>Here's your One Time Password (OTP) code to reset your account password:</p>
        <h2>{{$otp}}</h2>
        <h3>Please use this code to verify your account.</h3>
    </div>
    <p>If you did not request this code, please ignore this email.</p>
</body>

</html>