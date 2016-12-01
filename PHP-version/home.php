<?php include './view/header.php'; ?>

<h1>Accouting page</h1>

<?php
if (isset($tempArray) && !empty($tempArray)) {
    echo "<h3>Entries you added</h3>";
    echo "<ul>";
    foreach ($tempArray as $temp){
        echo "<li>";
        foreach($temp as $value)
            echo "$value";
        echo "</li>";
    }
    echo "</ul>";
}
?>

<form action = "./index.php" method="post">
    <input type="hidden" name="action" value="add"/>
    
    <label>Name</label>
    <input type="text" name="this[name]"/><br>

    <label>Price</label>
    <input type="number" name="this[price]"/><br>
    
    <input type="submit" value="Add new entry"/>
</form>

<form action="./index.php" method="post">
    <input type="submit" name="action" value="pop last"/>
</form>

<form action="./index.php" method="post">
    <input type="submit" name="action" value="save"/>
</form>

<br>
<form action="./index.php" method="post">
    <input type="submit" name="action" value="query"/>
</form>


<?php include './view/footer.php'; ?>
