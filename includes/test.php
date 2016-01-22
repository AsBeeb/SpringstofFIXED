<?php 

class Test {
    public function fetch_all() {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM test ORDER BY SUBSTRING_INDEX(test_id, ' ', -1) DESC ");
//        $query = $pdo->prepare("SELECT * FROM kalender ORDER BY kalender_id='High' DESC ");
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function fetch_data($test_id) {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM test WHERE test_id = ?");
        $query->bindValue(1, $test_id);
        $query->execute();
        
        return $query->fetch();
    }
}

?>