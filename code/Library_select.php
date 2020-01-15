
<html>
<head>
    <title>Library System</title>
    <meta charset="UTF-8"/>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery
/jquery-1.4.min.js"></script>

</head>
<body >
<div class=\"tip\">
    <input type="button" value="return" onclick="javascript:window.location='Borrow&return_UI.php'">
</div>
<?php


include("config.php");
$sql="SELECT * FROM book where bno in(select bno from borrow where cno='$_GET[cno]')";
$outcome= mysqli_query($online,$sql);
echo mysqli_error($online);



echo'<table align = "center" border = "1" width = "1300" style="text-align: center;">';
echo "<caption style=\"height:120px;\"><h1>$_GET[cno]book name</h1></caption>";
echo "<tr class=\"bg\">";
echo "<td>"."Book ID"."</td>";
echo "<td>"."Category"."</td>";
echo "<td>"."Title"."</td>";
echo "<td>"."Publisher"."</td>";
echo "<td>"."Author"."</td>";
echo "<td>"."Year"."</td>";
echo "<td>"."Price"."</td>";
echo "<td>"."Total Amount"."</td>";
echo "<td>"."Current Amount"."</td>";
echo "</tr>";
$class=2;
while($sql = mysqli_fetch_array($outcome))
{
    if($class==1)
        $class=2;
    else
        $class=1;
    echo "<tr class=\"bg".$class."\">";
    echo "<td>".$sql['bno']."</td>";
    echo "<td>".$sql['category']."</td>";
    echo "<td>".$sql['title']."</td>";
    echo "<td>".$sql['press']."</td>";
    echo "<td>".$sql['year']."</td>";
    echo "<td>".$sql['author']."</td>";
    echo "<td>".$sql['price']."元</td>";
    echo "<td>".$sql['total']."</td>";
    echo "<td>".$sql['stock']."</td>";

    echo "</tr>";
}

echo "</table>";
mysqli_close($online);

?>
</body>
</html>