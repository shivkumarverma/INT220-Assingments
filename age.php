<html>

<body>
    


    <form action="age.php" method="get">
        Enter Age : <input type="number" name="age" value="{$age}" ><br>

        <input type="submit">
    </form>

    <?php 

 if(isset($_GET["age"])){

    $age = $_GET["age"];
     
  if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range"=>26, "max_range"=>56))) === false) {
    echo("Age is Not valid");
  } else {
    echo("Age is valid");
  }
}

    ?>

</body>

</html>
