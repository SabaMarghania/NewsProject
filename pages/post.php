<?php 
//  get news and search in db php
// include "blocks/connect.php";
// global $conn;
$post = $_GET['news'];
$sql1 = "SELECT * FROM `posts` INNER JOIN `users` ON `users`.`user_id` = `posts`.`post_author` WHERE `post_id` = '$post'";
$result = $conn->query($sql1);
// echo $post;
$commentsql = " SELECT * FROM `comments` INNER JOIN `users` ON `users`.`user_id` = `comments`.`users_id` INNER JOIN `posts` ON `posts`.`post_id` = `comments`.`post_id` WHERE `posts`.`post_id` = $post ORDER BY `comment_id`;";
$commentresult = $conn->query($commentsql);
// print_r($commentresult);
// get row of commentresult
$commentrow = $commentresult->fetch_assoc();
// print_r($_SESSION['user_id']);
include "comment.php";
?>
<link rel="stylesheet" href="styles/post.css">

<div class="post">
    <div class="post__container">
        <?php foreach($result as $post) {?>
        <div class="post__container__item">
            <img width='200px' src="images/<?php echo $post['post_image']?>" alt="">
            <div class="post__container__info">
                <h1><?php echo $post['post_title'] ?></h1>
            <div class="post__container__subinfo">
                <p><?php echo $post['timestamp'] ?></p>
                <p><?php echo $post['email'] ?></p>
            </div>
            </div>
            <div class="post_desc">
                <p><?php echo $post['post_description'] ?></p>

            </div>
        </div>

        <div class="comments">
            <h3>Comments</h3>
            <div class="comments__box">
            <?php foreach($commentresult as $comment) {?>
            <div class="comments__box__item">
                <img width="60" height="60" src="images/img.jpeg" alt="">
                <div class="comments__author__profile">
                    <div class="comments__author__profile__info">
                        <p><?php echo $comment['name'] ?></p>
                        <p><?php echo $comment['created_at'] ?></p>
                    </div>
                    <div class="comments__text">
                        <p><?=$comment['comment_text']?></p>
                    </div>  
                </div>
            </div>
            <?php } ?>
               
            </div>

        </div>

        <?php } ?>
        <?php if(isset($_SESSION['name'])){ ?>
        <div class="comment">
    <!-- echo "<script>window.location.href='https://localhost/HomeworkEU2022/NewsProject/index.php?menu=home'</script>"; -->
            <h1>Post a comment</h1>
            <form  method="post">
                <textarea name="comment_send" id="" cols="10" rows="10" placeholder="Comment"></textarea>
                <input type="submit" name="comment_btn" value="Send">
            </form>
    </div>
    <?php }else{ ?>
    <div class="comment">
        <h1>Post a comment</h1>
        <p>You need to login to post a comment</p>
    </div>
    <?php } ?>
    </div>

</div>