<?php

session_start();

include_once('../../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    if (isset($_POST['title'], $_POST['link'], $_POST['content'])) {
        $title = $_POST['title'];
        $link = $_POST['link'];
        $content = nl2br($_POST['content']);
        
        if (empty($title) or empty($content) or empty($link)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO klubblad (klubblad_title, klubblad_link, klubblad_content, klubblad_timestamp) VALUES (?, ?, ?, ?)');
            
            $query->bindValue(1, $title);
            $query->bindValue(2, $link);
            $query->bindValue(3, $content);
            $query->bindValue(4, time());
            
            $query->execute();
            
            header('Location: ../index.php');
        }
    }
?>

<html>
        <head>
            <title>Tilf&oslash;j medlem</title>
            <link rel="stylesheet" href="../../stylesheet.css" type="text/css"/>
        </head>

        <body>
            <div class="content">
                <div class="add_content_t_bar">
                    <h3><a href="../index.php" id="logo">Menu</a></h3>
                </div>
                <div class="add_admn_content">
                    <h4>Tilf&oslash;j medlem</h4>

                    <?php if (isset($error)) { ?>
                            <small style="color:#aa0000;"><?php echo $error; ?></small>
                            <br /><br />
                        <?php } ?>

                    <form action="add.php" method="post" autocomplete="off" />
                        <input type="text" name="title" placeholder="Titel" /> <br /><br />
                        <input type="text" name="link" placeholder="Link" /> <br /><br />
                        <textarea rows="15" cols="50" placeholder="indhold" name="content"></textarea><br />
                        <input type="submit" value="Tilf&oslash;j medlem" />

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