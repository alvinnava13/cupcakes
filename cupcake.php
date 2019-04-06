<?php



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cupcakes</title>
</head>
<body>

<h1>Cupcake Fundraiser</h1>

<form action="cupcake.php" method="POST" id="form">
    <label>Your Name: <br><input type="text" name="name" size="50" maxlength="50" value="
    <?php if (isset($_POST['name'])) echo $_POST['name']; ?>"></label><br>
    <label><p>Cupcake Flavors:</p>
        <?php

        $flavors = array("grasshopper" => "The Grasshopper",
                            "maple" => "Whisky Maple Bacon",
                            "carrot" => "Carrot Walnut",
                            "caramel" => "Salted Caramel Cupcake",
                            "velvet" => "Red Velvet",
                            "lemon" => "Lemon Drop",
                            "tiramisu" => "Tiramisu");

        foreach($flavors as $key => $value)
        {
            echo "<input type='checkbox' value=$key name='flavor[]'>$value<br>";
        }

        ?>

        <br><input type="submit" name="submit" value="Order">
</form>

</body>
</html>