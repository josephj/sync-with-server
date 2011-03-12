<?php
header("Content-Type: text/html");
@apache_setenv('no-gzip', 1);
@ini_set('zlib.output_compression', 0);
@ini_set('implicit_flush', 1);

/*
for ($i = 0; $i < ob_get_level(); $i++) {
    ob_end_flush(); 
}
ob_implicit_flush(1);
*/

// All you need is 256 spaces first
echo str_repeat(" ", 1024)."<pre>"; 
ob_flush();
flush();

// and ANY TAG before \r\n
echo "working...<br/>\r\n"; 
ob_flush();
flush(); 
sleep(1); // this in cycle

for ($i = 0; $i < 1000; $i++)
{
    echo "working($i) ...<br/>\r\n"; 
    ob_flush();
    flush(); 
    sleep(1); // this in cycle
}
?>
