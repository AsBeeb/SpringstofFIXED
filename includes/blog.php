<?php 

class Blog {
    public function fetch_all() {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM blog ORDER BY SUBSTRING_INDEX(blog_id, ' ', -1) DESC ");
//        $query = $pdo->prepare("SELECT * FROM kalender ORDER BY kalender_id='High' DESC ");
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function fetch_data($blog_id) {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM blog WHERE blog_id = ?");
        $query->bindValue(1, $blog_id);
        $query->execute();
        
        return $query->fetch();
    }
}

?>