<html>
<head>
  <title>IP to Hostname</title>
</head>
     <body bgcolor="#080808" text="#FFFFFF">
IP --> Hostname <br>
<?php
echo "Your IP is ";

echo $_SERVER["REMOTE_ADDR"];
?>
<br>
<input class=field type=text name=getHost value="127.0.0.1" > 
<input type=hidden name=HOSTN value=1> 
<input type=submit value=Find border=0> 
</form> 

</BODY> 
</HTML>