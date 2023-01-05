<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .checkbox {
            /* style the checkbox when it is not checked */
            appearance: none;
            width: 20px;
            height: 20px;
            background-color: #eee;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            box-shadow: 0 1px 2px;
        }
        .checkbox:checked {
            /* style the checkbox when it is checked */
            background-color: #2ecc71;
            border: 1px solid #27ae60;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 0 0 15px rgba(46, 204, 113, 0.1);
        }

        .checkbox-label {
            /* style the label for the checkbox */
            font-size: 16px;
            font-weight: bold;
            margin-left: 10px;
        }


    </style>
</head>
<body>
<form action="process_form.php" method="post">
    <div>
        <input type="checkbox" class="checkbox" id="option1" name="option1" value="yes">
        <label for="option1" class="checkbox-label">Option 1</label>
    </div>
    <div>
        <input type="checkbox" class="checkbox" id="option2" name="option2" value="yes">
        <label for="option2" class="checkbox-label">Option 2</label>
    </div>
    <div>
        <input type="checkbox" class="checkbox" id="option3" name="option3" value="yes">
        <label for="option3" class="checkbox-label">Option 3</label>
    </div>
    <input type="submit" value="Submit">
</form>

</body>
</html>