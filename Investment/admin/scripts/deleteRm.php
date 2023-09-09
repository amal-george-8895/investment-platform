<?php

session_start();
include '../db_conn.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query  = "DELETE FROM `user`
                     WHERE id='$id'";  //query to delete the row from 'user' table where 'id' matches the given value
    $result   = mysqli_query($con, $query); // Execute the SQL query and stores in it
    if ($result) {
        echo "<div class='form'>
                  <h3>Rm Deleted successfully</h3><br/>
                  <p class='link'>Back to <a href='../rmpage.php'>Rm List</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Some thing went wrong.$query</h3><br/>
                  <p class='link'>Click here to <a href='../rmpage.php'>Try</a> again.</p>
                  </div>";
    }

}
?>