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
                        session_start();
                        $name = $_SESSION['name'];
                        echo "$name";
                        ?>
                    </h3>
                    <p>
                        <?php
                    
                        $role = $_SESSION['role'];//stores role in the variable
                        echo "$role";
                        ?>
                    </p>
                </div>
             
                <ul>
                    <?php
                    $userId = $_SESSION['id'];//stores id in the variable
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
                                   
                                    $previous_name = $_SESSION['emailid'];//stores email id in the variable
                                    echo "$previous_name<br />";
                                    ?></h4>
                                <a href="#" style="text-decoration: none;color: #ffffff;margin: 12px 30px;font-size: 18px;font-weight:500;"><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="content">
                    <div class="row text-center">
                        <h3 style="color:#0d6efd;">IDEAS</h3>
                    </div>

                   

                    <div class="row my-4">

                        <div class="row">
                            <?php
                            include 'db_conn.php';
                            $sql = "SELECT * FROM `ideas`";//select all data from idea table
                            $result = $con->query($sql);
                            if($result)
                            {
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo "<div class=\"col-4 my-2\">
                                                <div class=\"card\" >
                                                 <div class=\"card-body\">
                                                  <h5 class=\"card-title\">".'Instrument Name :'. $row['instrument_name']."</h5>
                                                 <p class=\"card-text\">".'Issuer :'. $row['Issuer']."</p>
                                                 <p class=\"card-text\">".'Industry Sector L1 :'. $row['industry_sector_l1']."</p>
                                                 <p class=\"card-text\">".'stock_exchange :'. $row['stock_exchange']."</p>
                                                 
                                                 <p class=\"card-text\">".'Price Currency:'. $row['price_currency']."</p>
                                                 <p class=\"card-text\">".'Closing price:'. $row['closing_price']."</p>
                                                 <p class=\"card-text\">".'Risk Rating:'. $row['risk_rating']."</p>
                                             </div>
                                            </div>
                                             </div>";
                                    }
                                }
                                else
                                {
                                    echo "No Data";
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

            </div>
        </div>
        
  
        <script>
            var jerry = document.querySelector(".hamburger");
            jerry.addEventListener("click",function(){
                document.querySelector("body").classList.toggle("active")
            })
        </script>
    </body>
</html>