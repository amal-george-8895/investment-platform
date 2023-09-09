<?php
session_start();
include 'admin/db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>RM</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/37af1810bd.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="admin/styles/common.css">

</head>

<body>
  <!-- ==topbar== -->


  <!--==topbar ends==-->

  <!--==body of the content ==-->
  <div class="container pt-5 mb-0 pb-0">
    <div class="row">
      <div class="col-md-6 mt-0  mb-0 pb-0" style="height:500px;">
        <img src="admin/image/login.avif" alt="image1" style="height:120%;width: -webkit-fill-available;">
      </div>
      <div class="col-md-6 mt-0  mb-0 pb-0" style="height:500px;">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" href="index.php" type="button">Admin</a>
            <a class="nav-link" href="rm/index.php" type="button">RM</a>
            <a class="nav-link" href="client/index.php">Client</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div style="color: #0d6efd;" class="text-center my-4">
            <h3 class="grid2h3">Admin LOGIN</h3>
          </div>
          <form name="f1" action="admin/scripts/adminLogin.php" onsubmit="return validation()" method="POST"
            class="row d-flex justify-content-center">
            <div class="w-75">
              <input type="text" id="uname" name="uname" class="form-control" placeholder="User Id">
            </div>
            <div class="w-75">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="row d-flex justify-content-center">
              <button type="submit" class="btn btn-primary w-25 my-4">LOGIN</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <script>
    function validation() {
      var id = document.f1.uname.value;
      var ps = document.f1.password.value;
      if (id.length == "" && ps.length == "") {
        alert("User Name and Password fields are empty");
        return false;
      } else {
        if (id.length == "") {
          alert("User Name is empty");
          return false;
        }
        if (ps.length == "") {
          alert("Password field is empty");
          return false;
        }
      }
    }
    </script>
</body>

</html>