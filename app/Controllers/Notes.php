<?php
/**
 * Created by PhpStorm.
 * User: Razzaru
 * Date: 22.04.2017
 * Time: 19:00
 */

namespace App\Controllers;


use App\Models\Note;

class Notes
{
    public function actionCreate($data)
    {
        $note = new Note();
        $note->saveNote($data);
    }
}