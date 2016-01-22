<?php

session_start();

include_once('../../includes/connection.php');
include_once('../../includes/blog.php');

$blog = new Blog;

if (isset($_SESSION['logged_in'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = $pdo->prepare('DELETE FROM blog WHERE blog_id = ?');
        $query->bindValue(1, $id);
        $query->execute();
        
        header('Location: delete.php');
    }
    
    $blog = $blog->fetch_all();
?>

<html>
        <head>
            <title>Fjern medlem</title>
            <link rel="stylesheet" href="../../stylesheet/stylesheet2.css" type="text/css"/>
            <link rel="stylesheet" href="../../stylesheet/admin.css" type="text/css"/>
        </head>

        <body>
            <div class="content">
                <div class="add_content_t_bar">
                    <div class="content_t_back"><a href="../index.php" id="logo">Menu</a></div>
                </div>
                <div class="admn_content">

                    <h4>Slet opslag</h4>

                    <form action="delete.php" method="get">
                        <select onchange="this.form.submit();" name="id">

                                <option selected disabled>Slet et opslag</option>

                            <?php foreach ($blog as $blog) { ?>
                                <option value="<?php echo $blog['blog_id']; ?>">
                                    <?php echo $blog['blog_title']; ?>
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