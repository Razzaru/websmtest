<?php
/**
 * Created by PhpStorm.
 * User: Razzaru
 * Date: 22.04.2017
 * Time: 19:00
 */

namespace App\Models;

use App\Model;

class Note
    extends Model
{
    const TABLE = 'notes';

    public $fullName;
    public $email;
    public $leadText;

    public function saveNote($note)
    {
        $this->fill($note);
        if ($this->validate()) {
            $this->insert();
        }
    }

    protected function validate()
    {
        if ($this->validateName() && $this->validateEmail() && $this->validateText()) {
            return true;
        }

        return false;
    }

    protected function fill($note)
    {
        $this->fullName = $note['fullName'];
        $this->email = $note['email'];
        $this->leadText = $note['leadText'];
    }

    protected function validateName()
    {
        return preg_match('~.{5,50}~', $this->fullName);
    }

    protected function validateEmail()
    {
        return preg_match('~\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}~', $this->email);
    }

    protected function validateText()
    {
        return preg_match('~.{5,250}~', $this->leadText);
    }
}