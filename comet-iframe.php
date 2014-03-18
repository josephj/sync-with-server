<?php

header("Content-type: text/html");

echo str_repeat(" ", 1024); 

for ($i = 0; $i < 1000; $i++)
{
    $wait = rand(1, 3);
    ob_flush();
    flush(); 
    $num = rand(10, 100);
    echo "&lt;script&gt;top.callback('Server said $num. ');&lt;/script&gt;<br>";
    echo "<script>top.callback('Server said $num.');</script>";
    sleep($wait);
}
?>

