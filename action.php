<?php 
require_once "config.php";

class db extends Database{


    public function web_hits($ip){
        
        $sql = "INSERT ken_web.visits (ip_address) VALUES (:ip_address)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['ip_address'=>$ip]);

        return true;
    }
}


?>