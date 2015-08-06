<?php
session_start();
/* session : I use it if user already log in or not-if user already loged in we dont need go to register page */
include("includes/connect.php");
/* include command in php use to include another file in the code */
include("includes/html_codes.php");

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
        //email
        if(empty($_POST['email'])){
                $error[] = 'please enter your email. ';
                // the type of code below called " regular expression  " http://en.wikipedia.org/wiki/Regular_expression
        }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
                $email = mysql_real_escape_string($_POST['email']);
                // the code above , make the string somehting safe for data base, AMQPChannethat data base can read it -  we use this code alot
        }else{
                $error[] = 'your e-mail address is invalid. ';
        }
        //password
        if(empty($_POST['password'])){
                $error[] = ' please enter a password. ';
        }else{
                $password = mysql_real_escape_string($_POST['password']);
        }
        // I cleaned up the Password and Email by (mysql_real_escape_string) - however i didnt cleaned up the Username for sql becasue , user name doesnt inclide numebra and qutation, which sql care.    
        if(empty($error)){
                // this is good info
                $result = mysql_query("SELECT * FROM users WHERE email='$email' OR username='$username' " ) or die(mysql_error());
                if(mysql_num_rows($result)==0){
                        //thats good
                        $activation = md5(uniqid(rand(), true)); 
                        $result2 = mysql_query(" INSERT INTO tempusers (user_id,username,email,password,activation) VALUES('','$username','$email','$password','$activation') ") or die(mysql_error());
                        if(!$result2){
                                die('Could not insert into database: '.mysql_error());
                                
                        }else{
                                $message = "To activate your account click on this link: \n\n";
                                $message = "http://victoria1983.com".'/activate.php?email='.urlencode($email)."&key=$activation";
                                mail($email, 'Registration Confirmation', $message);
                                header('Location: prompt.php?x=1');
                        }
                }else{
                        header('Location: prompt.php?x=2');
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
        <title>Register</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="css/register.css">
</head>
<body>
       <div id="wrapper"> 
               <?php  headerAndSearchCode(); ?>
               
               <aside id="left_side">
                       <img src="images/photo1.jpg" />
               </aside>
               <section id="right_side">
                       <form id="generalform" class="container" method="post" action="">
                               <h3>Register</h3>
                               <?php echo $error_message; ?>
                        <div class="field">
                                <label for="username">Username:</label>
                                        <input type="text" class="input" id="username" name="username" maxlength="20"/>
                                        <p class="hint">20 characters maximum (letters and numbers only)</p>
                                </div>            
                        <div class="field">
                                <label for="email">Email:</label>
                                        <input type="text" class="input" id="email" name="email" maxlength="100"/>
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
