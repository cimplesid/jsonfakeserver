<?php
$servername = "localhost";
$username = "username";
$password = "password";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $password = "";
$username_err = $password_err = "";
$isLoggedIn = $flag=false,;
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(!empty(trim($_POST["email"]))){
        $username = trim($_POST["email"]);
    }
    
    if(!empty(trim($_POST["password"]))){
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = $username , password =$password";
        if($conn->query($sql)!=null){
            $flag=true;
            $isLoggedIn =true;
        }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
   
</head>
<body>
    <div><?php if($flag && $isLoggedIn) echo 'login success' else 'login failed'?></div>
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onSubmit="validate()">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $username; ?>">
                <span ><?php echo $username_err; ?></span>
                <label>Password</label>
                <input type="password" name="password">
                <span ><?php echo $password_err; ?></span>
                <input type="submit"   value="Login">
        </form>
        <script>
        
        function validate(){
  var email =  document.getElementsByName("email")[0].value;
  var pass =  document.getElementsByName("password")[0].value;
  if(email.length == 0 || !email.includes("@")){
      alert('Invalid email');
  }
  else if( pass.length == 0){
    alert('Password cannot be empty');
  }
}
        </script>

</body>
</html>