<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errors = [];

    if(empty($_POST['name']))
    {
        $errors[] = 'You forgot to enter your name.';
    }

    if(!isset($_POST['flavor']))
    {
        $errors[] = 'You must select at least one flavor.';
    }
    if(isset($_POST['flavor']))
    {
        $flavor = $_POST['flavor'];
    }

    if(empty($errors))
    {
        echo '<h1>Order Confirmation</h1>';
        //echo '<p>Thank you, ' . $_POST['name'] . ' ' . 'for your order of ' . implode(", ", $flavor) . ' cupcake</p>';
        echo '<p>Thank you, ' . $_POST['name'] . ', ' . 'for your order.</p>';
        echo '<p>Order Summary:</p>';

        echo '<ul>';

        foreach($_POST['flavor'] as $choice)
        {
            echo "<li>" . $choice . "</li>";
        }

        echo '</ul>';
        $cost = calculate_cost($flavor);
        echo '<p>Order Total: $' . $cost . '</p>';
    }
    else
    {
        echo '<h1>Error!</h1>
  		<p class="error">The following error(s) occurred:<br>';
        foreach ($errors as $msg)
        { // Print each error.
            echo " - $msg<br>\n";
        }
        echo '</p><p>Please try again.</p><p><br></p>';
    }

} // End of IF statement

// Calculate cost of selected cupcakes
function calculate_cost($flavor)
{
    $amount = count($flavor);

    $total = $amount * 3.5;

    return number_format($total, 2);
}

/*function create_checkbox($name, $value)
{
    // Start the element:
    echo '<input type="checkbox" name="flavor[]" value="' . $value . '"';

    // Check for stickiness:
    if (isset($_POST[$name]) && ($_POST[$name] == $value))
    {
        echo 'checked = "checked"';
    }

    // Complete the element:
    echo ">$value";
    echo '<br>';
}*/

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
    <p><label>Your Name: <br><input type="text" name="name" maxlength="50" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"></label></p><br>
    <label>Cupcake Flavors:</label><br>
        <?php
        // $key => $value
        $flavors = array("grasshopper" => "The Grasshopper",
                            "maple" => "Whisky Maple Bacon",
                            "carrot" => "Carrot Walnut",
                            "caramel" => "Salted Caramel Cupcake",
                            "velvet" => "Red Velvet",
                            "lemon" => "Lemon Drop",
                            "tiramisu" => "Tiramisu");

        foreach($flavors as $key => $value)
        {
            //echo "<input type='checkbox' value=$value name='flavor[]'>$value<br>";
            echo "<br><input type='checkbox' name='flavor[]' value='" . $value . "'>$value";
        }

        /*create_checkbox('flavor', 'grasshopper');
        create_checkbox('flavor', 'maple');
        create_checkbox('flavor', 'carrot');
        create_checkbox('flavor', 'caramel');
        create_checkbox('flavor', 'velvet');
        create_checkbox('flavor', 'lemon');
        create_checkbox('flavor', 'tiramisu');*/
        ?>

        <br><input type="submit" name="submit" value="Order">
</form>

</body>
</html>