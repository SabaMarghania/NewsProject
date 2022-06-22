<?php
$sql = "SELECT * FROM `posts` INNER JOIN `categToPost` ON `categToPost`.`posts_id` = `posts`.`post_id` INNER JOIN `categories` ON `categories`.`cat_id` = `categToPost`.`cats_id` ";
$result = $conn->query($sql);

// get url
// delete post
$url = explode('&post_id=', $_SERVER['REQUEST_URI']);

if($url[1]){
    $sql = "DELETE FROM `categToPost` WHERE `categToPost`.`posts_id` = $url[1]";
    $result = $conn->query($sql);
    // if($result){
    //     echo "<script>window.location.href='https://localhost/HomeworkEU2022/NewsProject/index.php?menu=home'</script>";

    // }
    $sql2 = "DELETE FROM `posts` WHERE `posts`.`post_id` = $url[1]";
    $result2 = $conn->query($sql2);
    if($result2){
        echo "<script>window.location.href='https://localhost/HomeworkEU2022/NewsProject/index.php?menu=home'</script>";

    }
}

?>
<link rel="stylesheet" href="styles/home.css">
<div class="delete">
    <div class="delete__container">
        <div class="delete__container__title">
            <h1>წაშლა,რედაქტირება</h1>
        </div>
        <?php foreach($result as $post) {?>
        <div class="home__container__item">
            <img width='200px' src="images/<?php echo $post['post_image'] ?>" alt="">
            <div class="home__container__info">
                <h3><?php echo $post['post_title'] ?></h3>
                <span><?php echo $post['timestamp'] ?></span>
                <?php
                $desc = $post['post_description'];
                $desc = substr($desc, 0, 100);
                ?>
                <p><?php echo $desc."..." ?></p>
                <a href="index.php?menu=post&news=<?php echo $post['post_id'] ?>">Read More</a>
                <form method="post">
                    <a class="delete_link" href="index.php?menu=delete&post_id=<?php echo $post['post_id'] ?>">Delete</a>
                    <a  href="index.php?menu=edit&post_id=<?php echo $post['post_id'] ?>">edit</a>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>