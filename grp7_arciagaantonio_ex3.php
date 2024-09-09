<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
    <link rel="stylesheet" type="text/css" href="exercise.css">
</head>
<body>
    <?php
        if (!file_exists('fruits.txt')) {
            file_put_contents('fruits.txt', '');
        }

        $fruits = file_get_contents('fruits.txt');
        $fruits = explode("\n", $fruits);

        function addFruit($fruit) {
            global $fruits;
            $fruits[] = $fruit;
            file_put_contents('fruits.txt', implode("\n", $fruits));
        }

        if (isset($_POST['submit'])) {
            $newFruit = trim($_POST['fruit']); 

            if (!empty($newFruit)) {
                addFruit($newFruit);
            } else {
                $error = "Please enter a fruit name.";
            }
        }
    ?>

<h1>Fruit Site | Group 7</h1>
    <ul>
        <?php foreach ($fruits as $fruit) { ?>
            <li><?php echo $fruit; ?></li>
        <?php } ?>
    </ul>
    <form action="" method="post">
        <input type="text" name="fruit" placeholder="Enter a new fruit">
        <input type="submit" name="submit" value="Add Fruit">
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
    </form>
</body>
</html>