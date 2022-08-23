<?php

class Order

{

    public $id;
    public $user_id;
    public $status;
    public $date;

    public function __construct($user_id, $status, $date, $id = 0)

    {

        if ($id > 0) {
            $this->id = $id;
        }

        $this->user_id = $user_id;
        $this->status = $status;
        $this->date = $date;
    }

}