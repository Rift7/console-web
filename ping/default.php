<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
<head>
<title>PING</title>
</head>
<?php

$max_count = 1000; //maximum count for ping command
$unix      =  1; //set this to 1 if you are on a *unix system      
$windows   =  0; //set this to 1 if you are on a windows system

$register_globals = (bool) ini_get('register_gobals');
$system = ini_get('system');
$unix = (bool) $unix;
$win  = (bool)  $windows;
//
If ($register_globals)
{
   $ip = getenv(REMOTE_ADDR);
   $self = $PHP_SELF;
} 
else 
{
   $submit = $_GET['submit'];
   $count  = $_GET['count'];
   $host   = $_GET['host'];
   $ip     = $_SERVER['REMOTE_ADDR'];
   $self   = $_SERVER['PHP_SELF'];
};
// form submitted ?
If ($submit == "Ping!") 
{
   // over count ?
   If ($count > $max_count) 
   {
      echo 'Maximum for count is: '.$max_count;
      echo '<a href="'.$self.'">Back</a>';
   }
   else 
   {
      // replace bad chars
      $host= preg_replace ("/[^A-Za-z0-9.-]/","",$host);
      $count= preg_replace ("/[^0-9]/","",$count);
      echo '<body bgcolor="#080808" text="#FFFFFF"></body>';
      echo("Ping Output:<br>"); 
      echo '<pre>';           
      //check target IP or domain
      if ($unix) 
      {
         system ("ping -n $count $host");
      }
      else
      {
         system("ping -n $count $host");
      }
      echo '</pre>';
    }
} 
else 
{
    echo '<body bgcolor="#080808" text="#FFFFFF"></body>';
    echo '<p><font size="2">Your IP is: '.$ip.'</font></p>';
    echo '<form methode="post" action="'.$self.'">';
    echo '   Enter IP or Host <input type="text" name="host" value="'.$ip.'"></input>';
    echo '   Enter Count <input type="text" name="count" size="2" value="4"></input>';
    echo '   <input type="submit" name="submit" value="Ping!"></input>';
    echo '</form>';
    echo '<br><b>'.$system.'</b>';
    echo '</body></html>';
}
?>