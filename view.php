<?php
    // again we check the $_GET variable
    if(isset($_GET['photo_id']) && is_numeric($_GET['photo_id'])) {
        $sql = "SELECT file_type, file_size, file_content, file_name FROM photos
            WHERE photo_id=".$_GET['photo_id'];
 
        $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
 
        // select our database
        mysql_select_db("property") or die(mysql_error());
 
        $result = mysql_query($sql)  or die("Invalid query: " . mysql_error());
 
        while($row=mysql_fetch_array($result)) {
            echo 'This is '.$row['file_name'].' from the database<br />';
          //  echo '<img '.$row['file_size'].' src="view.php?photo_id='.$_GET['photo_id'].'">';
   echo '<img width="100" height="100" src="data:image/jpeg;base64,' . 
           base64_encode( $row['file_content'] ) . '" />';

        }
    }
    else {
        echo 'File not selected';
    }
?>