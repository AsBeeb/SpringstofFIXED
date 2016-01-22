<?php

session_start();

include_once('../../includes/connection.php');
include_once('../../includes/klubblad.php');

$klubblad = new klubblad;

if (isset($_SESSION['logged_in'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = $pdo->prepare('DELETE FROM klubblad WHERE klubblad_id = ?');
        $query->bindValue(1, $id);
        $query->execute();
        
        header('Location: delete.php');
    }
    
    $klubblad = $klubblad->fetch_all();
?>

<html>
        <head>
            <title>Fjern medlem</title>
            <link rel="stylesheet" href="../../stylesheet.css" type="text/css"/>
        </head>

        <body>
            <div class="content">
                <div class="add_content_t_bar">
                    <h3><a href="../index.php" id="logo">Menu</a></h3>
                </div>
                <div class="add_admn_content">

                    <h4>Slet opslag</h4>

                    <form action="delete.php" method="get">
                        <select onchange="this.form.submit();" name="id">

                                <option selected disabled>Slet et opslag</option>

                            <?php foreach ($klubblad as $klubblad) { ?>
                                <option value="<?php echo $klubblad['klubblad_id']; ?>">
                                    <?php echo $klubblad['klubblad_title']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
        </body>
    </html>

<?php
    
} else {
    header('Location: ../index.php');
}

?>