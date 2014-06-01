<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Home</title>
    </head>
    <body>
     
      <h3>Signup Here:</h3>
        <form method="post" action="userindex.php">
        
                Please enter user name: <input type="text" name="username" value="" /><br />
                 Please enter password: <input type="password" name="password" value="" />
                <br />
                <input type="submit" value="Submit"/>
                
        
        
        </form>
     
    </body>
</html>



<?php
include ("dbroutines.php");

//$q="select Name, Password from users where Name = 'John'";
//  What did the user key in?
session_start();
if (isset($_POST['username'])) {
    
   // echo 'The user keyed in :'.$_POST['username'];
    if ($_POST['username']>'' && $_POST['password']>'' ) {
        $q="insert into users (Name, Password ) values ('".$_POST['username']."', '".$_POST['password']."')";
        echo 'query='.$q;
        $conn=db_connect();
        $result=$conn->query($q);
        echo '<br />xxx connection error '.$conn->error."xxx";
        unset($_POST['username']);
        unset($_POST['password']);
    } else {
        echo 'Please enter both username AND password!';  
    }

}

$q="select Name, Password from users";
$conn=db_connect();
$result=$conn->query($q);
echo 'xxx connection error'.$conn->error."xxx";
if ($result){
            // if you know for sure that there is only one record, use: $row=$result->fetch_row();


             if (!isset($_SESSION['AuthId'])) {
         header('userindex.php');
         exit;
         }

            // use if there might be multiple record
           echo '<hr />';
            for ($count=0; $row=$result->fetch_row(); ++$count ) {
                echo $count." Name=".$row[0]." password=".$row[1].'<br />';

            }
          echo '<b style="color:red;">there are '.$count.' users in your database!'.'</b><hr />';
}





?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
