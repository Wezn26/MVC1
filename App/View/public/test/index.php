<h1>Test Page!!!</h1>

 <?php foreach ($content as $value) : ?>
    <h3><?php echo $value['login']; ?></h3>
    <h3><?php echo $value['password']; ?></h3>
    <hr>
<?php endforeach; ?>