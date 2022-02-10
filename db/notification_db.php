<?php
    class NotificationHelper{
    private $db;
    private $ID = "id";
    private $USER = "user_id";
    private $MESSAGE = "message";
    private $DATE  = "date";
    private $STATUS = "status";
    public function __construct($db){
        $this->db = $db;
    }

    public function getClientNotifications($id_client){
        $query = "SELECT *
        FROM client_notification WHERE $this->USER=?
        ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_client);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toNotifications($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getSellerNotifications($id_seller){
        $query = "SELECT *
        FROM seller_notification WHERE $this->USER=?
        ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_seller);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toNotifications($result->fetch_all(MYSQLI_ASSOC));
    }

    public function insertClientNotification($notification){
        $query = "INSERT INTO client_notification($this->USER, $this->MESSAGE, $this->DATE, $this->STATUS) 
        values (?,?,CURDATE(),?)";
        $stmt = $this->db->prepare($query);
        $user = $notification->getUser();
        $message = $notification->getMessage();
        $status = $notification->getStatus();
        $stmt->bind_param('isi',$user, $message, $status);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function insertSellerNotification($notification){
        $query = "INSERT INTO seller_notification($this->USER, $this->MESSAGE,
         $this->DATE, $this->STATUS) values (?,?,CURDATE(),?)";
        $stmt = $this->db->prepare($query);
        $user = $notification->getUser();
        $message = $notification->getMessage();
        $status = $notification->getStatus();
        $stmt->bind_param('isi',$user, $message, $status);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function seeClientNotification($notification){
        $query = "UPDATE `client_notification` SET `status` = '0' WHERE `client_notification`.`id` = ?;";
        $stmt = $this->db->prepare($query);
        $notification_id = $notification->getId();
        $stmt->bind_param('i',$notification_id);
        $stmt->execute();
        return;
    }

    public function seeSellerNotification($notification){
        $query = "UPDATE `seller_notification` SET `status` = '0' WHERE `seller_notification`.`id` = ?;";
        $stmt = $this->db->prepare($query);
        $notification_id = $notification->getId();
        $stmt->bind_param('i',$notification_id);
        $stmt->execute();
        return;
    }

    private function toNotifications($notifications){
        foreach($notifications as $notification){
            yield new notification($notification[$this->ID], $notification[$this->USER], $notification[$this->MESSAGE], $notification[$this->DATE], $notification[$this->STATUS]);
        }
    }
}