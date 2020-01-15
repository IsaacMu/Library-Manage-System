<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv = "Content-Type" conteng = "text/html;charset = utf-8">
        <title>Library System</title>
        <style>        
        span{
        color:blue;
        }
        </style>
    </head>
    <body><center>
        <h1>Operation</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="radio" value="Borrow&Return"  name="op" />Borrow&Return&nbsp;&nbsp;
            <input type="radio" value="Add book"  name="op" />Add book&nbsp;&nbsp;
            <input type="radio" value="Search"  name="op" />Search&nbsp;&nbsp;
            <input type="radio" value="Manage"  name="op" />Manage&nbsp;&nbsp;
            <input type="submit" value="submit" />&nbsp;&nbsp;
        </form>
        </center>
    </body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['op']=="Borrow&Return")
        echo '<script type="text/javascript">  window.location='.'\''.'Borrow&return_UI.php'.'\''.'</script>';
    if($_POST['op']=="Add book")
        echo '<script type="text/javascript">  window.location='.'\''.'insert.php'.'\''.'</script>';
    if($_POST['op']=="Search")
        echo '<script type="text/javascript">  window.location='.'\''.'search.php'.'\''.'</script>';
    if($_POST['op']=="Manage")
        echo '<script type="text/javascript">  window.location='.'\''.'manage.php'.'\''.'</script>';
}
