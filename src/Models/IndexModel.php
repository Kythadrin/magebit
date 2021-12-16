<?php

class IndexModel extends Model 
{
    private $email;
    private $date;

    public function getEmail() 
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function checkEmail()
    {
        $sql = "SELECT * FROM subscriptions WHERE email = :email";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":email", $this->getEmail(), PDO::PARAM_STR);

        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return empty($res);
    }

    public function saveToDatabase()
    {
        $sql = "INSERT INTO subscriptions VALUES (:email, :date)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":email", $this->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(":date", $this->getDate(), PDO::PARAM_STR);

        $stmt->execute();
    }
}