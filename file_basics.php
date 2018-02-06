<?php

echo __FILE__ . '<br />';
echo __LINE__ . '<br />';
echo dirname(__FILE__) . '<br />';
echo __DIR__ . '<br />';

echo file_exists(__FILE__) ? 'yes' : 'no';
echo '<br />';

echo file_exists(__DIR__ . '/new.php') ? 'yes' : 'no';
echo '<br />';

echo file_exists(__DIR__) ? 'yes' : 'no';
echo '<br />';

echo is_file(__DIR__ . '/new.php') ? 'yes' : 'no';
echo '<br />';

echo is_file(__DIR__) ? 'yes' : 'no';
echo '<br />';

echo is_dir(__DIR__ . '/new.php') ? 'yes' : 'no';
echo '<br />';

echo is_dir(__DIR__) ? 'yes' : 'no';
echo '<br />';

echo is_dir('..') ? 'yes' : 'no';
echo '<br />';
