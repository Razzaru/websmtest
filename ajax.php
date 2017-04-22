<?php

$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

$ctrl = new \App\Controllers\Notes();
$ctrl->actionCreate($data);
