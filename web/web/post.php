<?php
function print_list() {
  $i = 0;
  $list = scandir("post");
  while ($i < count($list)) {
    if($list[$i] != '.') {
      if($list[$i] !='..') {
        echo "<li><a href='post.php?id=$list[$i]'>$list[$i]</a></li>";
      }
    }
    $i = $i + 1;
  }
}

function print_title() {
  if(isset($_GET['id'])) {
    echo $_GET['id'];
  } else {
    echo "환영합니다!!";
  }
}

function print_maintext() {
  if(isset($_GET['id'])) {
    echo file_get_contents("post/".$_GET['id']);
  } else {
    echo "스크롤을 내려 게시글을 작성해보세요!";
  }
}
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Notice-게시판</title>

</style>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php
    echo file_get_contents("nav.txt");
     ?>
  </nav>

  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">

          <?php
        echo file_get_contents("header_post.txt");
           ?>

          </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

        <div class="row">
          <div class="col-md-8 mb-5">
            <h2>
              <?php
            print_title();
             ?>
            </h2>
            <hr>
          <?php
          print_maintext();
           ?>

          </div>
          <div class="col-md-4 mb-5">
            <h2>게시글 목록</h2>
            <hr>
            <address>
              <strong><?php
                print_list();
               ?></strong>
              <br>
            </address>

          </div>
    </div>


  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">
      <font color = "white"><h2>게시글 쓰기</h2></font>
      </p>
      <p>
        <form action="create_process.php" method="post">
          <input type="text" name="title" placeholder="제목">
          <p><textarea name="description" rows="8" cols="120" placeholder="내용"></textarea></p>
          <input type="submit" value="업로드">
        </form>
      </p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
