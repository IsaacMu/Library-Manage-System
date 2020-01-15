
<html>
<head>
	<title>Return</title>
	<meta charset="UTF-8"  />
<script type="text/javascript">
</script>
<style type="text/css">
    td
{
    height: 50px;
}
input
{
    height: 50px;
}
.wh
{
    width: 600px;
	height: 300px;
	margin: 100px 0px 0px 450px;
	text-align: center;
}
td.input
{
    width: 30px;
}
</style>
</head>
<body>
<div class=\"tip\">
    <input type="button" value="return" onclick="javascript:window.location='turn.php'">
</div>
<div class="wh">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Return book&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></legend>
            <table align="center">
                <tr>
                    <td>Card ID</td>
                    <td><input type="text" name="cno"/></td>
                </tr>
                <tr>
                    <td>Book ID</td>
                    <td><input type="text" name="bno"/></td>
                </tr>
                <tr>
                    <td><input type="radio" name="op" value="br">Borrow</td>
                    <td><input type="radio" name="op" value="re">Return</td>
                    <td><input type="radio" name="op" value="sl">Search</td>
                    <td><input type="submit" value="submit"></td>
                </tr>
            </table>
        </fieldset>
</div>
</form>
</body>
</html>
<?php
$Err="";
$a=0;
$b=0;



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $_SESSION['account'] = '0001';

        include("config.php");

        $outcome1 = mysqli_query($online, "SELECT * FROM card");
        $outcome2 = mysqli_query($online, "SELECT * FROM book");


        while ($sql1 = mysqli_fetch_array($outcome1)) {
            if (strcmp($sql1['cno'], $_POST['cno']))
                $a = $a + 1;
            if ($a == 0) {
                $a = 2;
                break;
            }
            $a = 0;
        }

        if ($a != 2) {
            echo '<script type="text/javascript"> alert("No Card"); window.location=' . '\'' . 'Borrow&return_UI.php' . '\'' . ' </script>';
        }
        else if($_POST["op"]=="sl")
            echo '<script type="text/javascript"> window.location.href=' . '\'' . 'Library_select.php?cno=' . $sql1['cno'] .  '\'' . ' </script>';
        else{
            while ($sql2 = mysqli_fetch_array($outcome2)) {
                if (strcmp($sql2['bno'], $_POST['bno']))
                    $b = $b + 1;
                if ($b == 0) {
                    if ($_POST["op"] == "br")

                        echo '<script type="text/javascript"> window.location.href=' . '\'' . 'Library_borrow.php?cno=' . $sql1['cno'] . "&& bno=" . $sql2['bno'] . '\'' . ' </script>';
                    else if ($_POST["op"] == "re")
                        echo '<script type="text/javascript"> window.location.href=' . '\'' . 'Library_return.php?cno=' . $sql1['cno'] . "&& bno=" . $sql2['bno'] . '\'' . ' </script>';
                    exit();
                }
            }
            if ($b == 1) echo '<script type="text/javascript"> alert("No book"); window.location=' . '\'' . 'Borrow&return_UI.php' . '\'' . ' </script>';
            
        }

        


    }


?>