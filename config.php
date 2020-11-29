<?php
include('crendentials.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


ob_start();
define('THIS_PAGE', basename($_SERVER['PHP_SELF']),'DEBUG');


$koopa['Spike_Koopa'] = 'spike_Powerful Spiker.';
$koopa['Toady_Koopa'] = 'toady_Toadish Sychophant.';
$koopa['Chungus_Koopa'] = 'fatso_Big Belly Warrior.';
$koopa['Baller_Koopa'] = 'bally_Ballin Bouncer.';
$koopa['Toxic_Koopa'] = 'toxic_Spell Binding Flame-Starter.';


switch(THIS_PAGE){
    case 'index1.php' :
    $title = 'Function excercises';
    $mainheadline = 'index';
    $center = 'center';
    $body = 'home';
    break;

    case 'about.php' :
        $title = 'about page/info page';
        $mainheadline = 'about';
        $center = 'center';
        $body = 'about';
    break;
    case 'daily.php' :
        $title = 'Daily newsletter';
        $mainheadline = 'what is going on in the news';
        $center = 'center';
        $body = 'daily';
    break;

    case 'person.php' :
        $title = 'Customer page';
        $mainheadline = 'customer page';
        $center ='center';
        $body = 'customers';
    break;

    case 'contact.php' :
        $title = 'contact us today';
        $mainheadline = 'contact me as soon';
        $center = 'center';
        $body = 'contact';
    break;
    case 'gallery.php' :
        $title = 'Gallery Page';
        $mainheadline = 'KOOPA GANG';
        $center = 'center';
        $body = 'gallery';
    break;
//emailable form will be on this website.
}

$nav['index1.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['person.php'] = 'Customer';
$nav['contact.php'] = 'Contact me';
$nav['gallery.php'] = 'gallery';

function makelinks($nav){
    $myReturn ='';
    foreach($nav as $key => $value){
    if(THIS_PAGE == $key){
    $myReturn .='<li><a href=" '.$key.' " class="active"> '.$value.' </a></li>';
} else {
    $myReturn .='<li><a href=" '.$key.' "> 
    '.$value.' </a></li>';
} // end else
} // end foreach


return $myReturn;
//always return myReturn or the variable of myreturn
}// end of function makelinks

$firstname ='';
$lastname ='';
$email='';
$gender='';
$weapon='';
$privacy = '';
$comments ='';
$tel ='';


$firstnameer ='';
$lastnameer='';
$emailer='';
$genderer='';
$weaponer='';
$privacyer = '';
$commentser ='';
$telerr ='';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

if(empty($_POST['firstname'])){
    $firstnameer = 'Please fill out your name';
} else {
$firstname = $_POST['firstname'];    
}
if(empty($_POST['lastname'])){
    $lastnameer = 'Please fill out your last name';
} else {
$lastname = $_POST['lastname'];    
}
if(empty($_POST['email'])){
    $emailer = 'E-mail, Now';
} else {
$email = $_POST['email'];    
}
if(empty($_POST['phone'])){
    $phoneer = 'Phone number now!!';
} else {
$phone = $_POST['phone'];    
}
 
if(empty($_POST['gender'])){
    $genderer = 'Pick your prefered pronoun!';
} else {
$gender = $_POST['gender'];    
}
if ($gender =='male'){
$male = 'checked';
}elseif($gender =='female'){
    $female = 'checked';     
}

if(empty($_POST['weapon'])){
    $weaponer = 'Choose your Weapon';
} else {
$weapon = $_POST['weapon'];    
}
if(empty($_POST['privacy'])){
    $privacyer = 'Please agree with private';
} else {
$privacy = $_POST['privacy'];    
}
if (empty($_POST['comments'])) {
    $commentser ='Comment now';
} else {
$comments = $_POST['comments'];    
}

function myWeapons(){
    $myreturn = '';
    if(!empty($_POST['weapon'])){
    $myreturn = implode(',', $_POST['weapon']);
    } return $myreturn;
}
if(empty($_POST['tel'])) {  // if empty, type in your number
    $telerr = 'Your phone number please!';
    } elseif(array_key_exists('tel', $_POST)){
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['tel']))
    { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
    $telerr = 'Invalid format!';
    } else{
    $tel = $_POST['tel'];
    }
    }

if(isset($_POST['firstname'],
$_POST['lastname'],
$_POST['gender'],
$_POST['weapon'],
$_POST['comments'],
$_POST['tel'],
$_POST['privacy'])){

$to='jordanlui44@gmail.com';
$subject ='email' .date('m/d/y');
$body =''.$firstname.' has completed the form. '.PHP_EOL.''; 
$body .='we will send you an email to confirm: '.$email.' '.PHP_EOL.'';
$body .='your phone number: '.$tel.' '.PHP_EOL.'';
$body .='Yer weapons:'.myWeapons().' '.PHP_EOL.'';
$body .='They are of: '.$gender.' identity. '.PHP_EOL.'';
$body .='Comments:'.$comments.' '.PHP_EOL.''; 

$headers = array('From'
=> 'no-reply@jluicalculator.com',
'Reply-to' => ''.$email.''); 


mail($to, $subject, $body);
header('location: thx.php');  
}
}

//remember - this is placed at the end of your config file 
// function myerror($myfile, $myline, $errormsg) {
//      if(defined('DEBUG') && DEBUG) {
//          echo 'Error in file: <b>'.$myfile.' </b> on line: <b>'.$myline.' ';
//          echo 'Error message: <b> '.$errormsg.' </b>';
//          die();
//      } else{
//          echo 'WE HAVE ISSUE';
//          die();
//      }
//  }
