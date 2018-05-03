<?php

class GuestBookRecord
{
    protected $message;

    //d конструкторе передаем сообщение (меняться оно не будет)
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }
}