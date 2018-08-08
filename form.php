<!DOCTYPE html>
<html>
<head>
    <title>my php form</title>
</head>
<body>
<?php
    $name = '';
    $password = '';
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
    if (!isset($_POST['password']) || $_POST['password'] === "") {
        $ok = false;
    }else{
        $password = $_POST['password'];
    }
    if (!isset($_POST['comments']) || $_POST['comments'] === "") {
        $ok = false;
    }else{
        $comments = $_POST['comments'];
    }
    if (!isset($_POST['gender']) || $_POST['gender'] === "") {
        $ok = false;
    }else{
        $gender = $_POST['gender'];
    }
    if (!isset($_POST['terms']) || $_POST['terms'] === "") {
        $ok = false;
    }else{
        $terms = $_POST['terms'];
    }
    if (!isset($_POST['color']) || $_POST['color'] === "") {
        $ok = false;
    }else{
        $color = $_POST['color'];
    }
    if (!isset($_POST['languages']) || !is_array($_POST['languages'] )
    || count($_POST['languages'])===0)  {
        $ok = false;
    }else{
        $languages = $_POST['languages'];
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
            htmlspecialchars($password),
            htmlspecialchars($gender),
            htmlspecialchars($color),
            htmlspecialchars(implode("", $languages)),//we use implode() function to change the arrays to strings
            htmlspecialchars($comments),
            htmlspecialchars($terms));
    }
    if ($ok){
        //add database code here
        $db = mysqli_connect('localhost','root','','wenza');
        $sql = sprintf("INSERT INTO users(name,password,gender,color,comments)VALUES (
        '%s', '%s', '%s', '%s', '%s', '%s'
)",mysqli_real_escape_string($db,$name),
            mysqli_real_escape_string($db,$password),
            mysqli_real_escape_string($db,$gender),
            mysqli_real_escape_string($db,$color),
            mysqli_real_escape_string($db,$comments));
            mysqli_query($db,$sql);mysqli_close($db);
        echo '<p>User added.</p>';
    }
}
?>
<form method="post" action="">
    username:<input type="text" name="name" value="<?php
            echo htmlspecialchars($name);
    ?>"><br>
    password:<input type="password" name="password" value="<?php
            echo htmlspecialchars($password);
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
       </select><br><br>
    Languages spoken:
        <select name="languages[]" multiple size="5"> //name of multi-select end with []
            <option value="en"<?php
            if (in_array('en',$languages)){
                echo 'selected';
            }
            ?>>English</option>
            <option value="kw"<?php
            if (in_array('kw',$languages)){
                echo 'selected';
            }
            ?>>Kiswahili</option>
            <option value="fr"<?php
            if (in_array('fr',$languages)){
                echo 'selected';
            }
            ?>>French</option>
            <option value="it"<?php
            if (in_array('it',$languages)){
                echo 'selected';
            }
            ?>>Italian</option>
            <option value="kik"<?php
            if (in_array('kik',$languages)){
                echo 'selected';
            }
            ?>>Kikuyu</option>
        </select><br><br>
    Age range:
    <input type="range">
    <br>
    Comments:
        <textarea name="comments"><?php
            echo htmlspecialchars($comments);
            ?></textarea><br>

    <input type="checkbox" name="terms" value="ok"<?php
    if ($terms === 'ok'){
        echo 'checked';
    }
    ?>>I accept the T&C<br>
    <input type="submit" name="submit" value="submit">


</form>
</body>

</html>
