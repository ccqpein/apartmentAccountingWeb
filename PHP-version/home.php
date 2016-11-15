<?php include 'view/header.php'; ?>

<h1>Input the recipt</h1>
<?php foreach ($products as $product) : ?>
    <p> <?php echo $product['productName']; ?></p>
<?php endforeach; ?>

<h1>Delete Message</h1>
<p> <?php echo $delete_message; ?></p>

<h1>Insert Message</h1>
<p> <?php echo $insert_message; ?></p>

<?php include 'view/footer.php'; ?>
