<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            background-color: #fff;
        }

        .container {
            width: 100%;
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

        }

        .background-div {
            width: 500px;
            height: 300px;
            border: 1px solid green;
            background: #fff;
            box-shadow: 5px 5px 5px 5px grey;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .title {
            width: 96%;
            margin-left: 2%;
            text-align: center;
            font-size: 20px;
        }

        .button {
            width: 100px;
            height: 50px;
            background-color: #000;
            color: #fff;
            border-radius: 5px;
            margin-top: 1rem;
            font-size: 17px;
        }

        .button:hover {
            background-color: #fff;
            color: #000;
            cursor: pointer;
        }
    </style>
    <div class="container">
        <div class="background-div">
            <div class="title">
                A verification link was sent to your Email, Click the button to activate account.
            </div>
            <form action="https://mail.google.com/mail/u/0/#inbox/" method="POST">
                <input type="hidden" name="">
                <input type="submit" value="Check Gmail" class="button">
            </form>
        </div>
    </div>
</body>

</html>