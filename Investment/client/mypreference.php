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
        
        <div class="profile">
            <img src="image/3.png" alt="img">
            <h3>
                <?php
                $name = $_SESSION['name'];//stores name in the variable
                echo "$name";
                ?>
            </h3>
            <p>
                <?php
                $role = $_SESSION['role'];//stores the role in the variable
                echo "$role";
                ?>
            </p>
        </div>
       
        <ul>
            <?php
            $userId = $_SESSION['id'];
            echo "
                    <li><a href=\"profile.php?userId=$userId\">
                        <span class=\"icon\"><i class=\"fa-solid fa-address-card\"></i></span>
                        <span class=\"item\">My Profile</span>
                    </a></li> 
                      <li><a href=\"mypreference.php?userId=$userId\">
                        <span class=\"icon\"><i class=\"fa-solid fa-address-card\"></i></span>
                        <span class=\"item\">My Preference</span>
                    </a></li> 
                     <li><a href=\"ideaList.php?userId=$userId\">
                        <span class=\"icon\"><i class=\"fa-solid fa-address-card\"></i></span>
                        <span class=\"item\">Ideas</span>
                    </a></li>
                    <li><a href=\"scripts/logout.php\">
                        <span class=\"icon\"><i class=\"fa-solid fa-right-to-bracket\"></i></span>
                        <span class=\"item\">Logout</span>
                    </a></li>";
            ?>
        </ul>
    </div>
 
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

  

</div>
<section class="section about-section gray-bg" id="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 grid1_2 my-3">

            </div>
            <div class="col-lg-6 grid1_2 my-5">
                <div class="container mt-5">
                    <div class="row">
                        <h5>My Preferences</h5>
                    </div>
                    <div class="row">
                        <div class="row d-flex justify-content-end">
                        <button type="button"
                                onclick="window.location.href = 'addPreference.php';"
                        class="btn btn-primary w-25">Update Preference</button>
                    </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Asset Type</th>
                                <th scope="col">Industry Sector</th>
                                <th scope="col">Closing Price</th>
                                <th scope="col">Risk Rating</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include 'db_conn.php';
                            $clientId = $_SESSION['userId'];
                            $sql = "SELECT * FROM `preference` WHERE client_id='$clientId'";//query to fetch all data from preference table for the logged in client 
                            $result = $con->query($sql);
                            if ($result) {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                <td>".$row['asset_type']."</td>
                                <td>".$row['industry_sector']."</td>
                                <td>".$row['closing_price']."</td>
                                <td>".$row['risk_rating']."</td>
                            </tr>";
                                    }
                                }else{
                                    echo "No Preference updated";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var jerry = document.querySelector(".hamburger");
    jerry.addEventListener("click",function(){
        document.querySelector("body").classList.toggle("active")
    })
</script>
</body>
</html>