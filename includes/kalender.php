<?php 

class Kalender {
    public function fetch_all() {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM kalender ORDER BY SUBSTRING_INDEX(kalender_id, ' ', -1) DESC ");
//        $query = $pdo->prepare("SELECT * FROM kalender ORDER BY kalender_id='High' DESC ");
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function fetch_data($kalender_id) {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM kalender WHERE kalender_id = ?");
        $query->bindValue(1, $kalender_id);
        $query->execute();
        
        return $query->fetch();
    }
}

?>