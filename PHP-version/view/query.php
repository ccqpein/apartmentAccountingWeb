<?php include "header.php"; ?>
<?php require_once("./model/database.php"); ?>

<?php
if (isset($q_date) and !empty($q_date)){
    echo "<h2>There are ".$q_date." entries</h2>";
    $results = query_by_date($q_date);
}else if (!isset($q_count) or empty($q_count)){
    echo "<h2>There are last 10 entries</h2>";
    $results = query_by_count();
}else{
    echo "<h2>There are last ".$q_count." entries</h2>";
    $results = query_by_count($q_count);
}
?>

<?php
for ($i = 0; $i < $results->num_rows; $i++):
     $result = $results->fetch_assoc();
?>

<tr>
    <td><?php echo $result["name"]; ?></td>
    <td><?php echo $result["price"]; ?></td>
    <td><?php echo $result["add_time"]; ?></td>    
</tr>
</br>
<?php endfor;?>

</br>
</br>

<form action = "./index.php" method = "get">
    <input type = "hidden" name = "action" value = "query"/>
    
    <label>Count</label>
    <input type = "number" name = "query_count"/></br>
    
    <label>Date</label>
    <input type = "date" name = "query_date"/></br>

    <input type = "submit" value = "Query"/>
</form>

<a href="./">Back home</a>

<?php include "footer.php"; ?>
