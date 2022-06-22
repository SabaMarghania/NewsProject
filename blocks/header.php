
<header id="header">
       <div class="header__container">
              <div class="header__logo">
                <h1>
                <a href="index.php?menu=home">ნიუსები.ჯი</a>
                </h1>
            </div>
            <div class="header__menu">
                <ul>

                    <li><a href="index.php?menu=home">მთავარი</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=politics">პოლიტიკა</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=society">საზოგადოება</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=law">სამართალი</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=world">მსოფლიო</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=military">სამხედრო</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=economics">ეკონომიკა</a></li>
                        <span>|</span>
                    <?php if(isset($_SESSION['name'])) { ?>
                    <li><a href="index.php?menu=create">პოსტის დამატება</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=delete">წაშლა/რედაქტირება</a></li>
                        <?php } ?>
                        
                        

                </ul>
            </div>
           
            <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <ul>
                   <li><a href="index.php?menu=home">მთავარი</a></li>
                    <li><a href="index.php?menu=politics">პოლიტიკა</a></li>
                    <li><a href="index.php?menu=society">საზოგადოება</a></li>
                    <li><a href="index.php?menu=law">სამართალი</a></li>
                    <li><a href="index.php?menu=world">მსოფლიო</a></li>
                    <li><a href="index.php?menu=military">სამხედრო</a></li>
                    <li><a href="index.php?menu=economics">ეკონომიკა</a></li>
                    <?php if(isset($_SESSION['name'])) { ?>
                    <li><a href="index.php?menu=create">პოსტის დამატება</a></li>
                        <span>•</span>
                    <li><a href="index.php?menu=delete">წაშლა/რედაქტირება</a></li>
                        <?php } ?>
                        

                </ul>
               
                <ul>
                <li><a href="index.php?menu=login.php">ავტორიზაცია</a></li>
                    <hr>
                    <li><a href="index.php?menu=register.php">რეგისტრაცია</a></li>
                   
                </ul>

            </div>

            <span style="font-size: 2rem;cursor:pointer;" onclick="openNav()">&#9776;</span>


            <div class="header__login">
                <?php if(isset($_SESSION['name'])){ ?>
                <a href="index.php?menu=profile"><?=$_SESSION['email']?></a>
                <a href="index.php?menu=logout">გამოსვლა</a>
                <?php } else { ?>
                    <ul>
                        <li>
                            <a href="index.php?menu=login">ავტორიზაცია</a>

                        </li>
                        <li>
                            <a href="index.php?menu=register">რეგისტრაცია</a>

                        </li>

                    </ul>
                <?php } ?>

            </div>
        </div>
</header>
<script src="scripts/header.js"></script>