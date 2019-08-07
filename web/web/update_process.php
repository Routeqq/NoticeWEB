<?php
rename('post/'.$_POST['old_title'], 'post/'.$_POST['title']);
file_put_contents('post/'.$_POST['title'], $_POST['description']);
header('Location: /myweb/endex.php?id='.$_POST['title']);
?>
