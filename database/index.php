<?php 
    include("db.php");
    if (isset($_POST['submit'])) { 
        echo("was set post");
        newQuestion($_POST["content"], $_POST["author"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TA Manager - Questions</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="author">Author ID</label>
        <input type="text" name="author" id="author">
        <label for="content">What's your question?</label>
        <textarea name="content" id="content"></textarea>
        <input type="submit" name="submit" value="submit">
    </form>
    <ol>
        <?php 
          questionsToday();  
        ?>
    </ol>
</body>
</html>