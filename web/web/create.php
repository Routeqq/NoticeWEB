<?php
function print_list() {
  $i = 0;
  $list = scandir("post");
  while ($i < count($list)) {
    if($list[$i] != '.') {
      if($list[$i] !='..') {
        echo "<li><a href=\"endex.php?id=$list[$i]\">$list[$i]</a></li>";
      }
    }
    $i = $i + 1;
  }
}

function print_title() {
  if(isset($_GET['id'])) {
    echo $_GET['id'];
  } else {
    echo "Welcome";
  }
}

function print_maintext() {
  if(isset($_GET['id'])) {
    echo file_get_contents("post/".$_GET['id']);
  } else {
    echo "hello php!";
  }
}
 ?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>
      <a href="/myweb/endex.php">WEB</a>
    </h1>
    <ol>
      <?php
        print_list();
       ?>

    </ol>
    <form action="create_process.php" method="post">
      <input type="text" name="title" placeholder="title">
      <p><textarea name="description" rows="8" cols="80" placeholder="description"></textarea></p>
      <input type="submit">
    </form>
  </body>
</html>
