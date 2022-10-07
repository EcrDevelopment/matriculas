<?php
    //if(isset($_GET['cerra']) && $_GET['cerra']=='ok'){
        session_start();
        session_destroy();
        header('Location: ../../admin/');
    //}
?>