<?php
$sql = "SELECT * FROM `categories`";
$result = $conn->query($sql);
// insert into post
// select post where title = 

if(isset($_POST['create_btn'])){
    $title = $_POST['title'];
    $content = $_POST['description'];
    $category = $_POST['category'];
    $user_id = $_SESSION['user_id'];
    // $image = $_POST['image'];
    
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "images/$image");
   
   $sql = "INSERT INTO `posts` (`post_title`,`post_image`, `post_description`, `post_author`) VALUES ('$title','$image','$content','$user_id')";
   $result = $conn->query($sql);
 

    if($result){
        echo "<script>window.location.href='https://localhost/HomeworkEU2022/NewsProject/index.php?menu=home'</script>";
    }
}

    if(isset($_POST['title'])){

    $title = $_POST['title'];
    $sqlP = "SELECT * FROM `posts` WHERE `posts`.`post_title` = '$title'";
    $resultP = $conn->query($sqlP);
    $rowP = $resultP->fetch_assoc();
     $post_id = $rowP['post_id'];
    $sqlCat = "INSERT INTO `categToPost`(`posts_id`, `cats_id`) VALUES ('$post_id','$category')";
    $resultCat = $conn->query($sqlCat);

    }

?>


<link rel="stylesheet" href="styles/create.css">
<div class="addpage container">
    <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <!-- select -->
        <div class="form-group mt-2">
            <label for="category">Category</label>
            <select class="form-control mt-2" id="category" name="category">
               <?php
                foreach($result as $category) {
                     echo "<option value='".$category['cat_id']."'>".$category['cat_name']."</option>";
                }
               ?>
            </select>
        <button type="submit" class="btn btn-primary mt-2" name="create_btn">Submit</button>
    </form>
</div>    

</div>