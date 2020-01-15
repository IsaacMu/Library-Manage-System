<html>
    <head>
        <title>Search</title>
        <meta charset="UTF-8"  />
        <script type="text/javascript"></script>
        <style type="text/css">
            td {
                text-align:left;
                height: 24px;  }
            input {  height: 24px;  }
            .wh {
                width: 400px;
                margin: 100px 450px;
                text-align:left;
            }
            td.input {  width: 30px;  }
        </style>
    </head>
    <body>
        <div class="wh">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                    <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                    <table>
                        <tr><td><span>Operation</span>
                            <select name="select1">
                                <option value="0">Choose</option>
                                <option value="bno">ID</option>
                                <option value="category">category</option>
                                <option value="title">title</option>
                                <option value="press">press</option>
                                <option value="year">year</option>
                                <option value="year1">year gap</option>
                                <option value="author">author</option>
                                <option value="price">price</option>
                                <option value="price1">price gap</option>
                            </select></td>
                            <td>  Keyword<input type="text" name="input" style="width:140px;"/></td></tr>
                            <tr><td><span>Order</span>
                                <select name="select2">
                                    <option value="title">Choose</option>
                                    <option value="bno">ID</option>
                                    <option value="category">category</option>
                                    <option value="title">title</option>
                                    <option value="press">press</option>
                                    <option value="year">year</option>
                                    <option value="author">author</option>
                                    <option value="price">price</option>
                                </select></td>
                            <td>Between <input type="text" name="bot" style="width:72px;"/> <input type="text" name="top" style="width:72px;"/></td>
                            <td><input type="submit" value="Submit"></td></tr>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $mysql_server_name="localhost";
                                $mysql_username="root";
                                $mysql_password="";
                                $mysqli_database="library";
                                $conn=mysqli_connect($mysql_server_name, $mysql_username,$mysql_password);
                                mysqli_select_db($conn, $mysqli_database);

                                if($_POST['select1']=="0"){
                                    $sql="SELECT * FROM book order by book.$_POST[select2] limit 50";
                                }elseif($_POST['select1']=='year1'){
                                    $sql="select * from book where book.year >= $_POST[bot] AND book.year <= $_POST[top] order by book.$_POST[select2] limit 50";
                                }elseif($_POST['select1']=='price1'){
                                    $sql="select * from book where book.price >= $_POST[bot] AND book.price <= $_POST[top] order by book.$_POST[select2] limit 50";
                                }else{
                                    $sql="select * from book where book.$_POST[select1]='$_POST[input]' order by book.$_POST[select2] limit 50";
                                }

                                $result=mysqli_query($conn, $sql);
                                echo mysqli_error($conn);d
                                mysqli_data_seek($result, 0);
                                $line=1;
                                while ($row=mysqli_fetch_row($result))
                                {
                                    echo "<tr><td>$line</td></b>";
                                    for ($i=0; $i<mysqli_num_fields($result); $i++ )
                                    {
                                        echo '<td >';
                                        echo $row[$i];
                                        echo '</td>';
                                    }
                                    echo "</tr></b>";
                                    $line++;
                                }
                                echo "</table></b>";
                                echo "</font>";
                                mysqli_free_result($result);
                                mysqli_close($conn);
                            }
                        ?>
                    </table>
                </fieldset>
            </form>
        </div>
    </body>
</html>