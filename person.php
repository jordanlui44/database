<?php
include('config.php');
include('includes/header.php');
//database is connected

$sql = 'SELECT * FROM Person';
$iconn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
//data is extracted

$result = mysqli_query($iconn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_connect_error($iconn)));

//do we have more than 0 rows//

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        //this array will display the contents or your row
     echo'<ul>'; //use a similar a href value that we used for our switch
     echo '<li class="bold">For more information <a href="person-view.php?id='.$row['PersonID'].'">'.$row['FirstName'].' </a></li>';
     echo '<li>'.$row['LastName'].'</li>';
     echo '<li>'.$row['Style'].'</li>';
     echo '</ul>';
    } //closed while
} else { //what if there are no peeps
echo 'No one is here';
} //closed else

@mysqli_free_result($result);

// close connection?

@mysqli_close($iconn);
include('includes/footer.php');