<?php
session_start();
include("includes/connect.php");
include("includes/html_codes.php");

if(isset($_SESSION['user_id']) ){
        
        header('Location:account_itemsactive.php');
}

if (isset($_POST['submit'])){
        
        $error = array();
        // I craeted an array to store the error, if things go smoth array should remaind empty
        //username
        if(empty($_POST['username'])){
                $error[] = 'please enter a username. ';       
        }else if ( ctype_alnum($_POST['username']) ){
                $username = $_POST['username'];
                // this is a one i want to happen (upper code)
        }else{
                $error[] = 'user name must consist of letter and numbers. ';
        }
     
        //password
        if(empty($_POST['password'])){
                $error[] = ' please enter a password. ';
        }else{
                $password = mysql_real_escape_string($_POST['password']);
        }
        // I cleaned up the Password and Email by (mysql_real_escape_string) - however i didnt cleaned up the Username for sql becasue , user name doesnt inclide numebra and qutation, which sql care.    
        if(empty($error)){
                $result = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'  ") or die(mysql_error());
                
                if(mysql_num_rows($result)==1){
                        
                        while($row = mysql_fetch_array($result)){
                                $_SESSION['user_id'] = $row['user_id'];
                                header('Location:account_itemsactive.php');
                        }
                 // proceed        
              
                // log in code here:
                }else{
                        $error_message = '<span class="error">Username or Password is incorrect</span><br />';
                }
                
        }else{
        $error_message = '<span class="error">'; 
        foreach($error as $key => $values){
                $error_message.="$values";
        }
        $error_message.="</span><br/><br/>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Log In</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="css/login.css">
</head>
<body>
       <div id="wrapper"> 
               <?php  headerAndSearchCode(); ?>
               
               <aside id="left_side">
                       <img src="images/login.gif" />
               </aside>
               <section id="right_side">
                       <form id="generalform" class="container" method="post" action="">
                               <h3>Log In</h3>
                               <?php echo $error_message; ?>
                        <div class="field">
                                <label for="username">Username:</label>
                                        <input type="text" class="input" id="username" name="username" maxlength="20"/>
                                        
                                </div>            
                        <div class="field">
                          
                                <label for="password">Password:</label>
                                        <input type="password" class="input" id="password" name="password" maxlength="20"/>
                                        <p class="hint">20 characters maximum</p>
                                </div>
                                <input type="submit" name="submit" id="submit" class="button" value="Submit" />
                        </form>               
               </section>
       </div>
</body> 
</html>
