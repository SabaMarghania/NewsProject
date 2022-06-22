<link rel="stylesheet" href="styles/home.css">
<div class="home">
    <div class="home__container">
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
            </div>
        </div>
        <?php } ?>
    </div>
</div>