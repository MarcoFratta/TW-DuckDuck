<?php
class Notification{
    private $id;
    private $user;
    private $message;
    private $date;
    private $status;

    function __construct($id, $user, $message, $date, $status){
        $this->id=$id;
        $this->user=$user;
        $this->date=$date;
        $this->message=$message;
        $this->status = $status;
    }

    static function newNotification($user, $message, $date, $status){
        return new Self(null, $user, $message, $date, $status);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getStatus()
    {
        return $this->status;
    }
}
?>