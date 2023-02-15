<p>Main Page</p>

<?php foreach ($content as $value) : ?>
    <h3><?php echo $value['login']; ?></h3>
    <h3><?php echo $value['password']; ?></h3>
    <hr>
<?php endforeach; ?>

<!-- <p><?php var_dump($this->route['controller']); ?></p> -->