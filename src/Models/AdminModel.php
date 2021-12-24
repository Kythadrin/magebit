<?php

class AdminModel extends Model 
{
    public function getEmails($email, $sort, $filter) 
    {
        $sql = "SELECT * FROM `subscriptions` WHERE email LIKE :email AND SUBSTR(email, INSTR(email, '@') + 1) LIKE :filter ORDER BY $sort";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam('filter', $filter, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDomains()
    {
        $sql = "SELECT SUBSTR(email, INSTR(email, '@') + 1) AS 'domain' FROM `subscriptions` GROUP BY SUBSTR(email, INSTR(email, '@') + 1)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteEmail($email) 
    {
        $sql = "DELETE FROM `subscriptions` WHERE email = :email";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam('email', $email, PDO::PARAM_STR);

        $stmt->execute();
    }
}