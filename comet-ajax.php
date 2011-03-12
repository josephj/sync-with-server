<?php

header("Content-type: text/plain");

echo str_repeat(" ", 1024); 

for ($i = 0; $i < 1000; $i++)
{
    $wait = rand(1, 3);
    ob_flush();
    flush(); 
    $num = rand(10, 100);
    echo "Server said $num.\r\n";
    sleep($wait);
}
?>

