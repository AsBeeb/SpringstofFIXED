<?php 

class Bestyrelse {
    public function fetch_all() {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM bestyrelse");
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function fetch_data($bestyrelse_id) {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM bestyrelse WHERE bestyrelse_id = ?");
        $query->bindValue(1, $bestyrelse_id);
        $query->execute();
        
        return $query->fetch();
    }
}

?>