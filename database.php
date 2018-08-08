<!DOCTYPE html>
<html>
<head>
    <title>my php form</title>
</head>
<body>
<?php
$name = '';
$comments = '';
$gender = '';
$terms = '';
$color = '';
$language = array();
if (isset($_POST['submit'])){
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name'] === "") {
        $ok = false;
    }else{
        $name = $_POST['name'];
    }


    if (!isset($_POST['gender']) || $_POST['gender'] === "") {
        $ok = false;
    }else{
        $gender = $_POST['gender'];
    }


    if (!isset($_POST['color']) || $_POST['color'] === "") {
        $ok = false;
    }else{
        $color = $_POST['color'];
    }



    //process form
    if ($ok) {
        printf('username:%s,
<br> password: %s,
<br>Gender:%s,
<br>color:%s,
<br>languages:%s,
 <br>Comments:%s,
 <br>terms:%s ',

            htmlspecialchars($name),
            htmlspecialchars($gender),
            htmlspecialchars($color),
            htmlspecialchars(implode("", $languages)),//we use implode() function to change the arrays to strings
            htmlspecialchars($comments),
            htmlspecialchars($terms));
    }
    if ($ok){
        //add database code here
        $db = mysqli_connect('localhost','root','','easy');
        $sql = sprintf("INSERT INTO users(name,gender,color)VALUES (
        '%s', '%s', '%s'
)",mysqli_real_escape_string($db,$name),
            mysqli_real_escape_string($db,$gender),
        mysqli_real_escape_string($db,$color));
        mysqli_query($db,$sql);
        mysqli_close($db);
        echo '<p>User added.</p>';
    }
}
?>
<form method="post" action="">
    username:<input type="text" name="name" value="<?php
    echo htmlspecialchars($name);
    ?>"><br>

    Gender:
    <input type="radio" name="gender" value="f"<?php
    if ($gender === 'f'){
        echo 'checked';
    }
    ?>>female
    <input type="radio" name="gender" value="m"<?php
    if ($gender === 'm'){
        echo 'checked';
    }
    ?>>male
    <input type="radio" name="gender" value="bi"<?php
    if ($gender === 'bi'){
        echo 'checked';
    }
    ?>>bisex<br>
    Favourite color:
    <select name="color">
        <option value="">Please pick a color</option>
        <option value="#f00"<?php
        if ($color=== '#f00'){
            echo 'selected';
        }
        ?>>red</option>
        <option value="#f01"<?php
        if ($color=== '#f01'){
            echo 'selected';
        }
        ?>>pink</option>
        <option value="#f02"<?php
        if ($color=== '#f02'){
            echo 'selected';
        }
        ?>>yellow</option>
        <option value="#f03"<?php
        if ($color=== '#f03'){
            echo 'selected';
        }
        ?>>purple</option>

    </select>
        <br>

    <input type="submit" name="submit" value="submit">


</form>
</body>

</html>
