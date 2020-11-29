<?php
//person view page
include('config.php');

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header('Location:person.php');
}

$sql = 'SELECT * FROM Person WHERE PersonID ='.$id.'';

$iconn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
//data is extracted

$result = mysqli_query($iconn,$sql) 
or die(myerror(__FILE__,__LINE__,mysqli_connect_error($iconn)));

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     $FirstName = stripslashes($row['FirstName']);
     $LastName = stripslashes($row['LastName']);  
     $Style = stripslashes($row['Style']);
     $Country = stripslashes($row['Country']); 
     $BirthDate = stripslashes($row['BirthDate']); 
     $Feedback = '';      
    } 
} else {
    $Feedback = 'Sorry no fighers - its Covid.'
}

include('includes/header.php'); ?>
<main>
<h2>Welcome to <?php echo $FirstName;?>'s Page</h2>
<?phpif($Feedback =='') {
    echo '<ul>';
    echo '<li><b>First Name:</b> '.$FirstName.' <li>';
    echo '<li><b>Last Name:</b> '.$LastName.' <li>';
    echo '<li><b>Style:</b> '.$Style.' <li>';
    echo '<li><b>Country:</b> '.$Country.' <li>';
    echo '<li><b>First Name:</b> '.$BirthDate.' <li>';
    echo '</ul>';
    echo'<p>'.$Description.'</p>';
    echo '<p><a href="person.php">Go back to the person page!</p>';   

} else {

 echo $Feedsback;
 
}
?>
</main>
<aside>
<?php
if($Feedback == ''){
    echo '<img src="uploads/person'.$id.'.png" alt="'$FirstName.' ">';
} else{
    echo $Feedback;
}
@mysqli_free_result($result);

// close connection?

@mysqli_close($iconn);
?>
</aside>
<?php
include('includes/footer.php');
?>