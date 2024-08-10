<?php 
$id_userid = $_GET['id'];

?>
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
        }

        .button:hover {
            background-color: #fff;
            color: #000;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 1rem;
        }

        .form-control {
            outline: none;
            border: 1px solid #7E7E7E;
            width: 100%;
            height: 40px;
            font-size: 1.2rem;
            padding: .375rem .75rem;
            background: transparent;
        }

        .form-control:focus {
            border: 1px solid #FE48AA;
        }

        .form-control::placeholder {
            opacity: 1;
            line-height: 1.2rem;
        }
    </style>
    <div class="container">
        <div class="background-div">
            <div class="title">
                Enter your new Password
            </div>
            <form action="update.inc.php?id=<?= $id_userid?>" method="POST">
                <input type="password" name="new_password" placeholder="Enter Password" class="form-control">
                <input type="submit" value="Update" class="button">
            </form>
        </div>
    </div>
</body>

</html>
