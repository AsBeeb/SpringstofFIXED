<?php

session_start();

include_once('../../includes/connection.php');
include_once('../../includes/bestyrelse.php');

$bestyrelse = new Bestyrelse;

if (isset($_SESSION['logged_in'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = $pdo->prepare('DELETE FROM bestyrelse WHERE bestyrelse_id = ?');
        $query->bindValue(1, $id);
        $query->execute();
        
        header('Location: delete.php');
    }
    
    $bestyrelse = $bestyrelse->fetch_all();
?>

<html>
        <head>
            <title>Fjern medlem</title>
            <link rel="stylesheet" href="../../stylesheet.css" type="text/css"/>
        </head>

        <body>
            <div class="content">
                <div class="content_t_bar">
                    <h3>Menu</h3>
                </div>
                <br />
                <a href="../index.php" id="logo">Tilbage</a>

                <br />
                
                <h4>Slet et medlem</h4>
                
                <form action="delete.php" method="get">
                    <select onchange="this.form.submit();" name="id">

                            <option selected disabled>Slet medlem</option>

                        <?php foreach ($bestyrelse as $bestyrelse) { ?>
                            <option value="<?php echo $bestyrelse['bestyrelse_id']; ?>">
                                <?php echo $bestyrelse['bestyrelse_title']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </form>
            </div>
        </body>
    </html>

<?php
    
} else {
    header('Location: index.php');
}

?>