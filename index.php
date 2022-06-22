<?php
include "blocks/connect.php";
global $conn;
session_start();



// filter categories
$keyword = $_GET['menu'];
$sql = "SELECT * FROM `posts` INNER JOIN `categToPost` ON `categToPost`.`posts_id` = `posts`.`post_id` INNER JOIN `categories` ON `categories`.`cat_id` = `categToPost`.`cats_id` WHERE `categories`.`cat_name` = '$keyword'";
$result = $conn->query($sql);

// get all posts for homepage
if($_GET['menu'] == "home"){
    $sql = "SELECT * FROM `posts` " ;
    $result = $conn->query($sql);
}
// server url
// print_r($_SERVER['REQUEST_URI']);
$url = explode("=", $_SERVER['REQUEST_URI']);
// print_r($url);
if(!$url[0] || !$url[1]){
     echo "<script>window.location.href='index.php?menu=home'</script>";
}


// for footer
$footerRes = "SELECT * FROM `posts` ORDER BY `posts`.`timestamp` LIMIT 3";
$footer_result = $conn->query($footerRes);
// print_r($footer_result);
// categories
$categories = "SELECT * FROM `categories` LIMIT 3";
$categories_result = $conn->query($categories);


$pages = [
    'home',
    'politics',
    'society',
    'law',
    'world',
    'military',
    'economics',
    'post',
    'register',
    'login',
    'logout',
    'comment',
    'create',
    'delete',
    'edit'
];

$url = explode('?menu=', $_SERVER['REQUEST_URI']);


if(strpos($url[1], '&')){
    $url = explode('&', $url[1]);
    $url[1] = $url[0];
    // print_r($url);
}
// print_r($url);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/sidebar.css">
</head>
<body>
    <div class="cont">
        <?php include('blocks/header.php') ?>   
        <div class="content">

        <?php
        include('blocks/sidebar.php');
    foreach ($pages as $page) {
        
        if ($page == $url[1]) {
           if(isset($_SESSION['name'])){
               if($page == 'login' || $page =='register'){
                   
            echo "<script>window.location.href='index.php?menu=home'</script>";
               }
           }
                 include('pages/'.$page.'.php');
               
          
        }
        
    }
    ?>
        </div>

    <?php include('blocks/footer.php') ?>
    </div>
</body>
</html>