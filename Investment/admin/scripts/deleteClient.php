<?php

session_start();
include '../db_conn.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query  = "DELETE FROM `user`
                     WHERE id='$id'"; //query to delete the user with the specified id
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>Client Deleted successfully</h3><br/>
                  <p class='link'>Back to <a href='../clientpage.php'>Client List</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Some thing went wrong.$query</h3><br/>
                  <p class='link'>Click here to <a href='../clientpage.php'>Try</a> again.</p>
                  </div>";
    }

}
?>