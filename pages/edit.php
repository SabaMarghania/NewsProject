<?php
// get url
$url = explode('&post_id=', $_SERVER['REQUEST_URI']);
$sql = "SELECT * FROM `categories`";
$result = $conn->query($sql);

if(isset($_POST['edit_btn'])) {
    $title = $_POST['title'];
    $content = $_POST['description'];
    $category = $_POST['category'];

     
    $image = $_FILES['editimage']['name'];
    $image_tmp = $_FILES['editimage']['tmp_name'];
    move_uploaded_file($image_tmp, "images/$image");

    $sql2 = "UPDATE `posts` SET `post_title` = '$title',`post_image`='$image',`post_description` = '$content' WHERE `post_id` = '$url[1]'";
    $result2 = $conn->query($sql2);
  

    $sql3 = "UPDATE `categToPost` SET `cats_id` = '$category' WHERE `posts_id` = '$url[1]'";
    $result3 = $conn->query($sql3);
      if($result2 && $result3){
        echo "<script>window.location.href='https://localhost/HomeworkEU2022/NewsProject/index.php?menu=home'</script>";
    }
}


?>
<link rel="stylesheet" href="styles/home.css">
<div class="delete">
    <div class="delete__container">
        <div class="delete__container__title">
            <h1>რედაქტირება</h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            <div class="delete__container__item">
                <label for="title">სათაური</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="delete__container__item">
                <label for="description">აღწერა</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="delete__container__item">
                <label for="image">სურათი</label>
                <input type="file" name="editimage" id="image">
            </div>
            <div class="delete__container__item">
                <label for="category">კატეგორია</label>
                <select name="category" id="category">
                    <?php foreach($result as $post) {?>
                    <option value="<?php echo $post['cat_id'] ?>"><?php echo $post['cat_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="delete__container__item">
                <input type="submit" name="edit_btn" value="რედაქტირება">
            </div>
        </form>
    </div>
</div>