<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга</title>
    <style>
        article{
            border: 5px solid aqua;
            padding: 15px 10px;
            margin: 10px ;
            width: 300px;
            float: left;
        }
    </style>
</head>
<body>


<h1>Запись:</h1>

<hr>
    <article>
        <?php echo $view->display( 'db.txt'); ?>
    </article>

</body>
</html>