<?php
if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['user_id'];
       
    }
    if(isset($_SESSION['name'])){
        echo "<script>window.location.href=index.php?menu=home'</script>";
    }
    // print_r($_SESSION);

}


?>
    <link rel="stylesheet" href="styles/login.css">
<div class="login">
    <form  method="post">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
      
        <button  name='login_btn'>Submit</button>
    </form>
</div>    
