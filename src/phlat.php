<?php

require_once('includes.php');

Logger::timestamp();
Logger::hr();

$stopwatch = new Stopwatch();
$stopwatch->start();

// arguments
$shortopts = 's:i:o:';
$options = getopt($shortopts);

try {
	$start_file = $options['s'];
	$ignore_files = explode(',', $options['i']);
	$output_file = isset($options['o']) ? $options['o'] : 'out.php';
} catch(Exception $e) {
	Logger::log('Error: parameters missing');
}

// files already imported
$imported_files = [];

// output buffer
$buffer = '';

// get first file
$content = file_get_contents($start_file);

$content = str_replace('<?php', '', $content);
$content = str_replace('?>', '', $content);

