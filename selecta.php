<!DOCTYPE html>
<html>
<head>
    <title>link php
    </title>
</head>
<body>
<ul>
    <?php
    $db = mysqli_connect('localhost','root','','wenza');
    $sql = "SELECT * FROM users";
    $result = mysqli_query($db, $sql);

    foreach ($result as $row){
        printf("<li><div style="color: %s;">%s (%s)</div></li>",
        $row["color"],
        $row[""]
        );
    }
    ?>

</ul>
</body>
</html>