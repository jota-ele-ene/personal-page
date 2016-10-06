<?php 

// check responsetime for a webbserver
function pingDomain($domain){

  $ch = curl_init($domain); //get url http://www.xxxx.com/cru.php?url=http://www.example.com
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  if(curl_exec($ch))
  {
  $info = curl_getinfo($ch);
  curl_close($ch);
  return  $info['total_time'];
  }

}  

echo "DIRECT;FILES;MYSQL<BR>";
for ($x = 1; $x <= 148; $x++) {
    // MySQL
echo pingDomain('http://www.google.com');
echo ";";
    // FILES
echo pingDomain('http://jln.bz/features/ffwd.php?url=HMCsK');
echo ";";
    // MySQL
echo pingDomain('http://jln.bz/features/fwd.php?url=d1yMh');
echo "<br>";
}
