<?php

$filename = 'filetest.txt';

echo filesize($filename) . '<br />'; //in bytes

// filemtime() : last modified (changed content)
// filectime() : last changed (changed metadata)
// fileatime() : last accessed (any read/change)

echo 'filemtime: ' . strftime('%m/%d/%Y %H:%M', filemtime($filename)) . '<br />';
echo 'filectime: ' . strftime('%m/%d/%Y %H:%M', filectime($filename)) . '<br />';
echo 'fileatime: ' . strftime('%m/%d/%Y %H:%M', fileatime($filename)) . '<br />';

//touch($filename);
echo '<hr />';

echo 'filemtime: ' . strftime('%m/%d/%Y %H:%M', filemtime($filename)) . '<br />';
echo 'filectime: ' . strftime('%m/%d/%Y %H:%M', filectime($filename)) . '<br />'; //not affected by touch() (at least on windows)
echo 'fileatime: ' . strftime('%m/%d/%Y %H:%M', fileatime($filename)) . '<br />';

echo '<hr />';

$path_parts = pathinfo(__FILE__);
echo 'dirname: ' . $path_parts['dirname'] . '<br />'; // "C:\apache\htdocs\phpBTBsandbox"
echo 'basename: ' . $path_parts['basename'] . '<br />'; // "file_details.php"
echo 'filename: ' . $path_parts['filename'] . '<br />'; // "file_details" (since PHP 5.2)
echo 'extension: ' . $path_parts['extension'] . '<br />'; // "php"
