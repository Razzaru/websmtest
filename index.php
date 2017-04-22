<?php

require 'autoload.php';

$view = new \App\View();

$view->display(__DIR__ . '/app/templates/index.html');