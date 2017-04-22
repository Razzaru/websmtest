<?php

$rawData = file_get_contents('php://input');
file_put_contents('log.txt', var_export(json_decode($rawData), true));
