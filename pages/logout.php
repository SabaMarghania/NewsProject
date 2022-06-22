<?php
echo $_GET['menu'];
if(isset($_GET['menu']) && $_GET['menu'] == "logout"){
    session_destroy();
    echo "<script>window.location.href='index.php?menu=home'</script>";
}

?>