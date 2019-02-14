<html>
<head>
<style type="text/css">
 body,td,th {
color: #03F;
 }
 a:link {
color: #29D93F;
 }
 body {
background-color: #DAD5D5;
 }
 </style>

  </head>
<body>
<center>
<p><h1><strong><big>SERVER ACCESS PAGE</big></strong></h1></p></center>
<form action="#" method="post">
ip<input type="text" name="ipaddress" size="50">   <br>
user<input type="text" name="user" size="50"><br>
Password<input type="password" name="password" size="50"><br>
port<input type="text" name="port" size="50"><br>
command <input type="text" name="command" size="50"><br>
<center>
<input type="submit" input name="submit" value="  SUBMIT  "><input type="reset"  
  input name="reset" value="   CLEAR   ">
</p>
 </form>
<?php
 $ip = trim($_POST['ipaddress']); 
 $user = trim($_POST['user']); 
 $pass = trim($_POST['password']);
 $port = trim($_POST['port']); 
 $command = trim($_POST['command']);

 if(isset($_POST['submit']) ) {

  $connection = ssh2_connect($ip,$port); 
  if (ssh2_auth_password($connection,$user, $pass)) {
    echo "Authentication Successful!\n";
  } else {
    die('Authentication Failed...');
  }
 }
 $shell=ssh2_shell($connection, 'terminal');
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
echo stream_get_contents($out);

?>
</body>
</html>