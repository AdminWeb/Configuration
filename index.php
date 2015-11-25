<?php
require 'vendor/autoload.php';
use Configuration\Parser\PHPParser;
use Configuration\Configuration;
$config = new Configuration;
$con = new PHPParser;

            echo mime_content_type('tests/config.json');