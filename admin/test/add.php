<?php

session_start();

include_once('../../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    if (isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);
        
        if (empty($title) or empty($content)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO test (test_title, test_content, test_timestamp) VALUES (?, ?, ?)');
            
            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());
            
            $query->execute();
            
            header('Location: ../index.php');
        }
    }
?>

<html>
        <head>
            <title>Tilføj medlem</title>
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
                
                <h4>Tilføj medlem</h4>
                
                <?php if (isset($error)) { ?>
                        <small style="color:#aa0000;"><?php echo $error; ?></small>
                        <br /><br />
                    <?php } ?>
                
                <form action="add.php" method="post" autocomplete="off" />
                    <input type="text" name="title" placeholder="Titel" /> <br /><br />
                    <textarea rows="15" cols="50" placeholder="indhold" name="content"></textarea><br />
                    <input type="submit" value="Tilføj medlem" />
                    
                </form>

            </div>
        </body>
    </html>

<?php
} else {
    header('Location: ../index.php');
}

?>