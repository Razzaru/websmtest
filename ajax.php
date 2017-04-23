<?php

require 'autoload.php';

if(file_get_contents('php://input')) {
    $rawData = file_get_contents('php://input');
    $rawData = strip_tags($rawData);
    $data = json_decode($rawData, true);
    
    try {
        $ctrl = new \App\Controllers\Notes();
        $ctrl->actionCreate($data);
    } catch (Exception $e) {
        file_put_contents('log.txt', $e->getMessage(), true);
    }
} else {
    $notes = \App\Models\Note::findAll();
    echo strip_tags(json_encode($notes));
}