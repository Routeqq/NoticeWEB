<?php
file_put_contents("post/".$_POST['title'], $_POST['description']);
header("Location: post.php?id=".$_POST['title']);
 ?>
