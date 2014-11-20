<?php
$ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
echo $ip.'<br>';
$query = @unserialize(file_get_contents('http://ip-api.com/php/121.54.92.67'));
if($query && $query['status'] == 'success') {
  echo 'Hello visitor from '.$query['countryCode'].', '.$query['city'].'!';
} else {
  echo 'Unable to get location';
}
?>
