<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv = "Content-Type" conteng = "text/html;charset = utf-8">
        <title>Borrow System</title>
        <style>        
        span{
        color:blue;
        }
        </style>
    </head>
    <body>
    <div class=\"tip\">
        <input type="button" value="return" onclick="javascript:window.location='turn.php'">
    </div>
    <h1>Borrow System</h1>
    <div class="wh">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <legend><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add and delete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></legend>
                <table align="center">
                    <tr>
                        <td>Card ID</td>
                        <td><input type="text" name="cno"/></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name"/></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td><input type="text" name="depart"/></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><input type="text" name="type"/></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="op" value="add"></td>
                        <td>Add</td>
                        <td><input type="radio" name="op" value="sub"></td>
                        <td>Delete</td>
                        <td><input type="submit" value="确定"></td>
                    </tr>
                </table>
            </fieldset>
    </div>
    </form>
    </center>
    </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["op"]=="add"){
            echo '<script type="text/javascript">alert("增加");window.location='.'\''.'add.php?cno='.$_POST['cno']."&&name=".$_POST['name']."&&dep=".$_POST['depart']."&& type=".$_POST['type'].'\''.' </script>';
        }
        if($_POST["op"]=="sub"){
            echo '<script type="text/javascript">window.location='.'\''.'sub.php?cno='.$_POST['cno']."&& name=".$_POST['Lname'].'\''.' </script>';
        }
}
    ?><center>
