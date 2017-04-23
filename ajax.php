<?php

require 'autoload.php';

if (count($_POST) !== 0) {
    $data = $_POST;
    $ctrl = new \App\Controllers\Notes();
    $ctrl->actionCreate($data);
    header('Location: index.php');
} elseif (file_get_contents('php://input')) {
    $rawData = file_get_contents('php://input');
    $rawData = strip_tags($rawData);
    $data = json_decode($rawData, true);
    try {
        $ctrl = new \App\Controllers\Notes();
        $ctrl->actionCreate($data);
    } catch (Exception $e) {
        file_put_contents('log.txt', $e->getMessage(), true);
    }
}