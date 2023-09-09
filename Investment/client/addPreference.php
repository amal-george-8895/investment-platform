<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RM</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/37af1810bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/common.css">
</head>

<body >



<div class="container-fluid bgclass">
    <div class="row">
        <div class="col-lg-6">
           
        </div>

        <div class="col-lg-6" style="display: flex;justify-content: flex-end; align-items: center;">
          
            <a href="#" style="text-decoration: none;color: #ffffff;margin: 12px 30px;font-size: 18px;font-weight: 500;"><span></span></a>
        </div>
    </div>
</div>



<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 grid1_2 my-3">
            <img src="image/add.png" alt="image1" class="img1">
        </div>
        <div class="col-lg-6 grid1_2 my-5">
            <div style="color:#0d6efd;text-align: center;">
                <h3 class="grid2h3">Update Preference</h3>
            </div>
            <form name="addPreferenceForm" method="post" action="scripts/addPreference.php">

                <div class="d-flex flex-column">
                    <h4>Asset Type</h4>
                    <select name="asset_type">
                        <?php
                        include 'db_conn.php';
                        $sql = "SELECT * FROM `products`";//select all data from product table
                        $result = $con->query($sql);//executes the query and stores the data in the variable
                        if($result)
                        {
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "<option value=".$row['title']." >". $row['title']."</option>";
                                }
                            }
                            else
                            {
                                echo "zero";
                            }
                        }
                        else
                        {
                            return $result->error;
                        }
                        ?>
                    </select>
                </div>


                <div class="d-flex flex-column">
                    <h4>Industry Sector</h4>
                    <select name="industry_sector_l1">
                        <?php
                        include 'db_conn.php';
                        $sql = "SELECT * FROM `ideas`";//select all data from ideas table
                        $result = $con->query($sql);//executes the query and stores the data in the variable
                        if($result)
                        {
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "<option value=".$row['industry_sector_l1']." >". $row['industry_sector_l1']."</option>";
                                }
                            }
                            else
                            {
                                echo "zero";
                            }
                        }
                        else
                        {
                            return $result->error;
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex flex-column">
                    <h4>Closing Price</h4>
                    <select name="closing_price">
                        <?php
                        include 'db_conn.php';
                        $sql = "SELECT * FROM `ideas`";
                        $result = $con->query($sql);
                        if($result)
                        {
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "<option value=".$row['closing_price']." >".$row['closing_price']."</option>";
                                }
                            }
                            else
                            {
                                echo "zero";
                            }
                        }
                        else
                        {
                            return $result->error;
                        }
                        ?>
                    </select>
                </div>

                <div class="d-flex flex-column">
                    <h4>Risk Rating </h4>
                    <select name="risk_rating">
                        <?php
                        include 'db_conn.php';
                        $sql = "SELECT * FROM `ideas`";
                        $result = $con->query($sql);
                        if($result)
                        {
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "<option value=".$row['risk_rating']." >". $row['risk_rating']."</option>";
                                }
                            }
                            else
                            {
                                echo "zero";
                            }
                        }
                        else
                        {
                            return $result->error;
                        }
                        ?>
                    </select>
                </div>
                <div class=" mt-2">
                    <button type="button" onclick="window.location.href = 'mypreference.php';" class="btn btn-danger">BACK</button>
                    <button type="submit"  class="btn btn-primary">SUBMIT</button>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
