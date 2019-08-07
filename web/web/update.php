<?php
//<script>alert("babo");</script>

//Cross site Scripting

//XSS
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
    <a href="create.php">create</a>
    <form action="delete.php" method="post">
      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
      <?php
      if(isset($_GET['id'])) {
        echo "<input type=\"submit\" value=\"delete\">";
      }
       ?>
       <?php if(isset($_GET['id'])) { ?>
         <a href="update.php?id=<?php echo $_GET['id']; ?>">update</a>
       <?php } ?>
    </form>
    <h2>
      <form action="update_process.php" method="post">
        <input type="hidden" name="old_title" value="<?php echo $_GET['id']; ?>">
        <input type="text" name="title" placeholder="title" value="<?php echo $_GET['id']; ?>">
        <p><textarea name="description" rows="8" cols="80" placeholder="description"><?php print_maintext(); ?></textarea></p>
        <input type="submit">
      </form>
  </body>
</html>
