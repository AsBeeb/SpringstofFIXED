<?php 

class Klubblad {
    public function fetch_all() {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM klubblad ORDER BY SUBSTRING_INDEX(klubblad_id, ' ', -1) DESC ");
//        $query = $pdo->prepare("SELECT * FROM kalender ORDER BY kalender_id='High' DESC ");
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function fetch_data($klubblad_id) {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM klubblad WHERE klubblad_id = ?");
        $query->bindValue(1, $klubblad_id);
        $query->execute();
        
        return $query->fetch();
    }
}

?>