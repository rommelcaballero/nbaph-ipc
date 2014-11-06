<?php
$rds_hosts = parse_ini_file("/etc/hosts.rds");
$hosts_file_append = "\n";
foreach ($rds_hosts as $host => $saved_ip)
{
$new_ip = gethostbyname($host);
if ( $new_ip == $host) continue; //failed to resolve
if ( $new_ip == $saved_ip ) continue; //nothing new
if ( $new_ip == "" ) continue; //it's empty
if(!filter_var($new_ip, FILTER_VALIDATE_IP)) {
 // it's not a valid ip address
 continue;
}
//we have something new, lets append this to the hosts file
$hosts_file_append .= "$new_ip\t$host.internal\n";
//lets save this to the config file as well
file_put_contents("/etc/hosts.rds", str_replace("$host=$saved_ip", "$host=$new_ip", file_get_contents("/etc/hosts.rds")));
echo "We have a new ip, the new ip is $new_ip\n";
}
if ( $hosts_file_append != "\n" )
{
file_put_contents("/etc/hosts", file_get_contents("/etc/hosts.original").$hosts_file_append);
}
?>
