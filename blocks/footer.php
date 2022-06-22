<footer>
    <div class="footer__container">
        <div class="footer__info">
            <h1>ნიუსები.ჯი</h1>
            <p>ნიუსები.ჯი არის თქვენი ახალი ამბების, გასართობი, მუსიკალური მოდის ვებგვერდი.
                ჩვენ პირდაპირ მოგაწვდით უახლეს ამბებს და ვიდეოებს
                გასართობი ინდუსტრიიდან.
            </p>

            <div class="social__icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer__recentPost">
            <h3>ბოლო ამბები</h3>
            <div class="recentPost__container">
                <?php foreach($footer_result as $recentPost){?>
                <div class="recentPost__item">
                    <img src="images/<?=$recentPost['post_image']?>" alt="">
                    <div class="recentPost__item__info">
                        <h5><?=$recentPost['post_title']?></h5>
                        <p>
                            <?php
                        $desc = $recentPost['post_description'];
                        $desc = substr($desc, 0, 20);
                        echo $desc;
                        ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="footer__categories">
            <h3>კატეგორიები</h3>
            <div class="categories__container">
                <?php foreach($categories_result as $category){?>
                <div class="categories__item">
                    <a href="index.php?menu=<?=$category['cat_name']?>"><?=$category['cat_name']?></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>