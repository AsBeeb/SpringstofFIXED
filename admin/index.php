<?php 

session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    if (isset($_POST['title'], $_POST['feed'], $_POST['link'], $_POST['content'])) {
        $title = $_POST['title'];
        $feed = $_POST['feed'];
        $link = $_POST['link'];
        $content = nl2br($_POST['content']);

        if (empty($title) or empty($feed) or empty($content) or empty($link)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO blog (blog_title, blog_feed, blog_link, blog_content, blog_timestamp) VALUES (?, ?, ?, ?, ?)');

            $query->bindValue(1, $title);
            $query->bindValue(2, $feed);
            $query->bindValue(3, $link);
            $query->bindValue(4, $content);
            $query->bindValue(5, time());

            $query->execute();

            header('Location: ../index.php');
        }
    }
?>
    
    <html>
        <head>
            <title>Admin - Menu</title>
            <link rel="stylesheet" href="../stylesheet/stylesheet2.css" type="text/css"/>
            <link rel="stylesheet" href="../stylesheet/admin.css" type="text/css"/>
        </head>

        <body>
        <div class="content">
            <h1>Admin - Kontrolpanel</h1>
            <div class="content_t_back"><a href="../index.php" id="logo">Tilbage</a></div>


            <div class="admn_content">
                <h4>Blog Menu</h4>

                <?php if (isset($error)) { ?>
                    <small style="color:#aa0000;"><?php echo $error; ?></small>
                    <br /><br />
                <?php } ?>

                <form action="index.php" method="post" autocomplete="off" />
                <input type="text" name="title" placeholder="Titel" /> <br /><br />
                <input type="text" name="feed" placeholder="Feed" /> <br /><br />
                <input type="text" name="link" placeholder="Link" /> <br /><br />
                <textarea rows="15" cols="50" placeholder="indhold" name="content"></textarea><br />
                <input type="submit" value="Tilf&oslash;j blog-post" />
                </form>


                <h4><a href="blog/delete.php">Slet blog-post</a></h4>
                <br />
                <h4><a href="logout.php">Log ud</a></h4>

            </div>
        </div>
        </body>
    </html>

<?php
    } else {
        //display login
        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            if (empty($username) or empty($password)) {
                $error = 'All fields are required!';
            } else {
                $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

                $query->bindValue(1, $username);
                $query->bindValue(2, $password);

                $query->execute();

                $num = $query->rowCount();

                if ($num == 1) {
                    //user entered correct details
                    $_SESSION['logged_in'] = true;
                    header('Location: index.php');
                    exit();
                } else {
                    $error = 'incorrect details!';
                }
            }
        }
        ?>

    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" href="../stylesheet/stylesheet2.css" type="text/css"/>
        </head>

        <body>
            <div class="content">
                <a href="index.php" id="logo">Login</a>

                    <br /><br />

                    <?php if (isset($error)) { ?>
                        <small style="color:#aa0000;"><?php echo $error; ?></small>
                        <br /><br />
                    <?php } ?>

                <form action="index.php" method="post" autocomplete="off">
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password" />
                    <input type="submit" value="Login" />
                </form>
            </div>
        </body>
    </html>

<?php
}
?>