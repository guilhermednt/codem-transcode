#!/usr/bin/php
<?php
$input = null;

if ($argc > 2) {
    foreach ($argv as $k => $val) {
        if ($val === '-i' && isset($argv[$k + 1])) {
            $input = explode(DIRECTORY_SEPARATOR, $argv[$k + 1]);
            break;
        }
    }
}

$file     = explode('.', array_pop($input));
$ext      = array_pop($file);
$fileName = implode('.', $file);

$safeFileName = preg_replace('/[^0-9A-Za-z_.-]/', '_', $fileName);

array_shift($argv);
$cmd = 'ffmpeg '.str_replace("%FILE_NAME%", $safeFileName, implode(' ', $argv));

file_put_contents('/home/gdnt/Desktop/ffmpeg-proxy.log', $cmd);
exec(escapeshellcmd($cmd));
