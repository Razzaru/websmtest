<?php

require 'autoload.php';

$view = new \App\View();

$view->notes = \App\Models\Note::findAll();

$view->display(__DIR__ . '/app/templates/index.php');