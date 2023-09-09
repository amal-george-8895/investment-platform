<?php
session_start();
$_SESSION['userId']=$_GET['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/37af1810bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/common.css">
    <link rel="stylesheet" href="./styles">
</head>
<style>
    .containercard{
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

                $name = $_SESSION['name'];
                echo "$name";
                ?>
            </h3>
            <p>
                <?php

                $role = $_SESSION['role'];
                echo "$role";
                ?>
            </p>
        </div>
        <!--== menu buttons== -->
        <ul>
            <?php
            echo "<li><a href=\"dashboard.php\">
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
                            $previous_name = $_SESSION['emailid'];
                            echo "$previous_name<br />";
                            ?></h4>
                        <a href="#" style="text-decoration: none;color: #ffffff;margin: 12px 30px;font-size: 18px;font-weight: 500;"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==dashboard container==-->

</div>

<section class="section about-section gray-bg" id="about">
    <div class="container col-md-8">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-6">
                <div class="about-text go-to mt-3">
                    

                    <?php
                    include 'db_conn.php';
                    $userId = $_SESSION['userId'];
                    $sql = "SELECT * FROM `user` WHERE id ='$userId'";//query to select the user with a userid from usertable
                    $result = $con->query($sql);
                    if($result)
                    {
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                echo "<h6 class=\"theme-color lead\">Role: ".$row['role']."</h6>
                            
                            <div class=\"row about-list\">
                                <div class=\"col-md-6\">
                                    <div class=\"media\">
                                        <label>First name</label>
                                        <p>".$row['fname']."</p>
                                    </div>
                                    <div class=\"media\">
                                        <label>Last name</label>
                                        <p>".$row['lname']."</p>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"media\">
                                        <label>E-mail</label>
                                        <p>".$row['emailid']."</p>
                                    </div>
                                    <div class=\"media\">
                                        <label>Phone</label>
                                        <p>".$row['phoneno']."</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"about-avatar\">
                            <img src=\"https://bootdey.com/img/Content/avatar/avatar7.png\" title=\"\" alt=\"\">
                        </div>
                        <div class=\"me-5 my-3\" style=\"text-align: center;\">
                            <p><a href=\"editprofile.php?userId=$userId\"><i class=\"fa-solid fa-pen-to-square\"></i>Edit</a></p>
                        </div>
                    </div>";
                            }
                        }
                        else
                        {
                            echo "$sql";
                        }
                    }
                    else
                    {
                        return $result->error;
                    }
                    ?>


                </div>

                <div class="container">
                    <div class="row">
                        <?php
                        include 'db_conn.php';
                        $userId = $_SESSION['userId'];

                        $sql = "SELECT * FROM `user` WHERE id ='$userId'";//query to select the user with a userid from usertable
                        $result = $con->query($sql);
                        if($result)
                        {
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    $id = $row["recommend_ideas"];
                                    $ideaSql = "SELECT * FROM `ideas` WHERE  FIND_IN_SET (id ,'$id')";
                                    $ideaResult = $con->query($ideaSql);
                                    if($ideaResult)
                                    {
                                        if($ideaResult->num_rows > 0)
                                        {
                                            echo "<div class=\"row\">
                       <h5>Recommended Ideas</h5>
                   </div>";
                                            while($row = $ideaResult->fetch_assoc())
                                            {
                                                echo "
                                           
                                                    <div class=\"col-4\">
                                                <div class=\"card\" >
                                                 <div class=\"card-body\">
                                                  <h5 class=\"card-title\">". $row['title']."</h5>
                                                 <p class=\"card-text\">". $row['description']."</p>
                                             </div>
                                            </div>
                                             </div>";

                                                if ($row['recommend_product'] != ''){
                                                    echo " <div class=\"row\">
                       <h5>Recommended Products</h5>
                   </div>";
                                                    $productId = $row["recommend_product"];
                                                    $productIdSql = "SELECT * FROM `products` WHERE  FIND_IN_SET (id ,'$productId')";
                                                    $productResult = $con->query($productIdSql);
                                                    while($row1 = $productResult->fetch_assoc()) {
                                                        echo "
                                                    <div class=\"col-4\">
                                                    <div class=\"card\" >
                                                      <div class=\"card-body\">
                                                     <h5 class=\"card-title\">" . $row1['title'] . "</h5>
                                                     <p class=\"card-text\">" . $row1['description'] . "</p>
                                                     <p class=\"card-text\">idea name : " . $row['title'] . "</p>
                                                    </div>
                                                     </div>
                                                    </div>";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else
                            {
                                echo "$sql";
                            }
                        }
                        else
                        {
                            return $result->error;
                        }
                        ?>
                    </div>
                </div>
            </div>
</section>
<!--== active hamburger==-->
<script>
    var jerry = document.querySelector(".hamburger");
    jerry.addEventListener("click",function(){
        document.querySelector("body").classList.toggle("active")
    })
</script>
</body>
</html>