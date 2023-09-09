<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/37af1810bd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./styles/common.css">
</head>
<style>
.containercard {
  width: 80%;
  margin-left: 250px;
}
</style>

<body>
  <div class="wrapper">
    <div class="sidebar">
      <!--==profile image ==-->
      <div class="profile">
        <img src="image/3.png" alt="img">
        <h3>
          <?php
                        //session_start();
                       $name = $_SESSION['name'];
                        echo "$name";
                        ?>
        </h3>
        <p>
          <?php
                        //session_start();
                        $role = $_SESSION['role'];
                        echo "$role";
                        ?>
        </p>
      </div>
      <!--== menu buttons== -->
      <ul>
        <?php
                    echo "  <li><a href=\"dashboard.php\">
                        <span class=\"icon\"><i class=\"fa-solid fa-house\"></i></span>
                        <span class=\"item\">Dashboard</span>
                    </a></li>
                    <li><a href=\"clientpage.php\">
                        <span class=\"icon\"><i class=\"fa-solid fa-house\"></i></span>
                        <span class=\"item\">Client</span>
                    </a></li>
                     <li><a href=\"rmpage.php\">
                        <span class=\"icon\"><i class=\"fa-solid fa-house\"></i></span>
                        <span class=\"item\">RM</span>
                    </a></li>
                    <li><a href=\"ideaList.php\">
                        <span class=\"icon\"><i class=\"fa-solid fa-lightbulb\"></i></span>
                        <span class=\"item\">Ideas</span>
                    </a></li>
                       <li><a href=\"Products.php\">
                        <span class=\"icon\"><i class=\"fa-solid fa-lightbulb\"></i></span>
                        <span class=\"item\">Products</span>
                    </a></li>
                
                    <li><a href=\"scripts/logout.php\">
                        <span class=\"icon\"><i class=\"fa-solid fa-right-to-bracket\"></i></span>
                        <span class=\"item\">Logout</span>
                    </a></li>";
                    ?>
      </ul>
    </div>
    <!--==topnavebar ==-->
    <div class="section">
      <div class="topnavbar">
        <div class="hamburger">
          <a href="#"><i class="fa-sharp fa-solid fa-bars"></i></a>
        </div>

        <div class="container-fluid bgclass">
          <div class="row">
            <div class="text-end" style="display: flex;justify-content: flex-end; align-items: center;">
              <h4 style="color: #ffffff;margin: 12px 30px;font-size: 18px;font-weight: 500;"><?php
                                    //session_start();
                                    $previous_name = $_SESSION['emailid'];//stores the emailid in the variable
                                    echo "$previous_name<br />";
                                    ?></h4>
              <a href="#"
                style="text-decoration: none;color: #ffffff;margin: 12px 30px;font-size: 18px;font-weight: 500;"><span></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--==dashboard container==-->
    <div class="section">
      <div class="content">
        <div class="row my-4">
          <div class="row">
            <?php
                            include 'db_conn.php';
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM `user` where role='client'";//query to select the user with a role of client from database
                            $result = $con->query($sql);
                            if($result) {
                                echo "<div class=\"col-4\">
                                                   <div class=\"card\" >
                                                       <div class=\"card-body\">
                                                            <h5 class=\"card-title mx-5\"><a href='clientpage.php'>Client Count </a></h5>
                                                            <h1 class=\"card-text \"> <span style=\"font-weight:bold; font-size: 37px; margin-left: 89px;\">$result->num_rows</span></h1>
                                                      </div>
                                                  </div>
                                             </div>";
                            }
                            if($_SESSION['role'] == 'admin'){ //check if the current user is an admin
                                $sql1 = "SELECT * FROM `user` where role='rm'"; // Select all users with the role of "rm"
                                $result1 = $con->query($sql1);
                                if($result1) {
                                    echo "<div class=\"col-4\">
                                                  <div class=\"card\" >
                                                      <div class=\"card-body\">
                                                       <h5 class=\"card-title mx-5\"><a href='rmpage.php'>RM Count </a></h5>
                                                          <h1 class=\"card-text \"> <span style=\"font-weight:bold; font-size: 37px; margin-left: 89px;\">$result1->num_rows</span></h1>   
                                                     </div>
                                                  </div>
                                              </div>";
                                }
                            }

                            ?>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--== active hamburger==-->
  <script>
  var jerry = document.querySelector(".hamburger");
  jerry.addEventListener("click", function() {
    document.querySelector("body").classList.toggle("active")
  })
  </script>
</body>

</html>