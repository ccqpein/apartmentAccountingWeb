<?php include "header.php"; ?>
<?php require_once("./model/database.php"); ?>

<?php
if (!isset($q_count)){
    echo "<h2>There are last 10 entries</h2>";
    $results = query_by_count();
}else{
    echo "<h2>There are last".$q_count." entries</h2>";
    $results = query_by_count($q_count);
}

for ($i = 0; $i < $results->num_rows; $i++){
    echo $results->fetch_assoc();
}

?>



<?php include "footer.php"; ?>
