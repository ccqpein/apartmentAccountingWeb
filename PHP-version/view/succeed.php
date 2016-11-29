<?php include "header.php" ?>
<h1>You added these entries successful:</h1>
<?php
echo "<ul>";
foreach ($tempArray as $temp){
    echo "<li>";
    foreach($temp as $value)
        echo "$value";
    echo "</li>";
}
echo "</ul>";
?>

<a href="./">Back</a>

<?php include "footer.php" ?>
