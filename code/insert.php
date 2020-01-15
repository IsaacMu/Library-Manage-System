<html>
    <head>
        <title>Add Book</title>
        <meta charset="UTF-8"  />
        <script type="text/javascript"></script>
        <style type="text/css">
            td { height: 24px;  }
            input {  height: 24px;  }
            .wh {
                width: 400px;
                margin: 100px 450px;
            }
            td.input {  width: 30px;  }
        </style>
    </head>
    <body>
    <div class=\"tip\">
        <input type="button" value="turn" onclick="javascript:window.location='turn.php'">
    </div>
        <div class="wh">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                    <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Book&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                    <table style="margin: 0 auto">
                        <tr><td><input type="radio" name="op" value="one">Single book</td>
                            <td><input type="radio" name="op" value="more">Multiple books</td></tr>
                        <tr><td>Book ID<input type="text" name="bno"/></td>
                        <td>Category<input type="text" name="category"/></td></tr>
                        <tr><td>Title<input type="text" name="title"/></td>
                        <td>Publish house<input type="text" name="press"/></td></tr>
                        <tr><td>Year<input type="text" name="year"/></td>
                        <td>Author<input type="text" name="author"/></td></tr>
                        <tr><td>Price<input type="text" name="price"/></td>
                        <td>Count<input type="text" name="num"/></td></tr>
                        <tr><td><input type="submit" value="submit"></td></tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mysqli_server_name = "localhost";
        $mysqli_username = "root";
        $mysqli_password = "";
        $mysqli_database = "library";
        $conn = mysqli_connect($mysqli_server_name, $mysqli_username, $mysqli_password);
        mysqli_select_db($conn, $mysqli_database);
        if($_POST["op"]=="one") {
            //Single book
            function _post($str)
            {
                $val = !empty($_POST[$str]) ? $_POST[$str] : null;
                return $val;
            }

            $bno = _post('bno');
            $category = _post('category');
            $title = _post('title');
            $press = _post('press');
            $year = (int)_post('year');
            $author = _post('author');
            $price = _post('price');
            $num = (int)_post('num');

            //If exist
            $sql = "select * from book where book.bno = $bno";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows) {
                $sql = "update book set book.total =  book.total +" . $num . ",book.stock = book.stock +" . $num . " where book.bno = $bno";
                $result = mysqli_query($conn, $sql);
                echo mysqli_error($conn);

            } else {
                //Add book
                $sql = "insert into book values ('$bno','$category','$title','$press','$year','$author','$price','$num','$num')";
                mysqli_query($conn, $sql);
                echo mysqli_error($conn);

            }
            mysqli_close($conn);
        }elseif ($_POST["op"]=="more"){
            //Multiple books
            $file='book.txt';
            $handle=fopen($file,'r');
            while (!feof($handle)){
                $row = fgets($handle);
                if ($row){
                    $content = explode(',',$row);
                    $bno=$content[0];
                    $category=$content[1];
                    $title=$content[2];
                    $press=$content[3];
                    $year=(int)$content[4];
                    $author=$content[5];
                    $price=$content[6];
                    $num=(int)$content[7];
                }
                $sql="select * from book where book.bno = $bno";
                $result=mysqli_query($conn, $sql);
                if($result->num_rows){
                    $sql="update book set book.total =  book.total +".$num.",book.stock = book.stock +".$num." where book.bno = $bno";
                    $result=mysqli_query($conn,$sql);
                    echo mysqli_error($conn);
                }else{
                    $sql="insert into book values ('$bno','$category','$title','$press','$year','$author','$price','$num','$num')";
                    mysqli_query($conn,$sql);
                    echo mysqli_error($conn);
                }
            }
            mysqli_close($conn);
        }
    }
?>