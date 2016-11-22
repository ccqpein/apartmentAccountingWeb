<?php include './view/header.php'; ?>

<h1>Accouting page</h1>

<?php  ?>


<form action = "./index.php" method="post">
    <input type="hidden" name="action" value="add"/>
    
    <label>Name</label>
    <input type="text" name="this[name]"/><br>

    <label>Price</label>
    <input type="number" name="this[price]"/><br>
    
    <input type="submit" value="Add new entry"/>
</form>


<?php include './view/footer.php'; ?>
