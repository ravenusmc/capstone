<?php 

//$docRoot = $_SERVER['DOCUMENT_ROOT'];
$docRoot = "http://localhost:8888/";

//$appPath = $_SERVER['REQUEST_URI'];
$appPath = "capstone/";

$fullPath = $docRoot . $appPath;

set_include_path($fullPath);

?>