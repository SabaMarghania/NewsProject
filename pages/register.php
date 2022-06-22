<?php
$msg='';
if(isset($_POST['reg_btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    $sql = "INSERT INTO `users`( `name`, `birthdate`, `email`, `password`, `gender`) VALUES ('$name','$birthday','$email','$password','$gender')";
    $result = $conn->query($sql);
    if($result){
    echo "<script>window.location.href='index.php?menu=home'</script>";
    }
}

?>
<link rel="stylesheet" href="styles/register.css">
<div class="signup">
    <form  method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" id="birthday">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="repass">Re-Password</label>
        <input type="password" name="repass" id="repass">
        <label for="gender">Gender</label>
        <div class="gender">
            <h5>Male</h5>
            <input type="radio" name="gender" value="Male">
            <h5>Female</h5>
            <input type="radio" name="gender" value="Female">
            <h5>Other</h5>
            <input type="radio" name="gender" value="Other">
        </div>
        <button type="submit" name='reg_btn'>Submit</button>
    </form>
    <?=$msg?>
</div>    
