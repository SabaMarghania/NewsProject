<?php
global $conn;
if(isset($_POST['comment_btn'])){
    $comment = $_POST['comment_send'];
    // echo $comment;
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO `comments` (`comment_text`, `post_id`, `users_id`) VALUES ('$comment', '$post', '$user_id')";
    $result = $conn->query($sql);
    // print_r($result);
    if($result){
        echo "<script>window.location.href='index.php?menu=post&news=$post'</script>";
    }
        // echo $user_id;
}
?>