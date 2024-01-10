<?php
include('db.php');
date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }

    public function checkUser($userId)
    {
        $query = $this->conn->prepare("SELECT * FROM `account` WHERE `acc_id` = '$userId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
    // public function sendMessage($senderId, $userId, $message)
    // {
    //     $dateTime = $this->dateTime();
    //     $query = $this->conn->prepare("INSERT INTO `message`(`SENDER_ID`, `RECEIVER_ID`, `MESSAGE`, `DATE_TIME`) VALUES (?, ?, ?, ?)");
    //     $query->bind_param('ssss', $senderId, $userId, $message, $dateTime);
    //     $addNotif = $this->conn->prepare("UPDATE `users` SET `INBOX`= `INBOX` + 1 WHERE `ID` = '$userId'");

    //     if ($query->execute() && $addNotif->execute()) {
    //         return 200;
    //     }
    // }
}
