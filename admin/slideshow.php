<?php
    /* 
        Action
            0 - delete Sildeshow
            1 - add Slideshow
            2 - edit Slideshow
            3 - update Slide
            4 - move up/move down
            5 - Enable/Disable
    */
if(isset($_GET['action'])){
    $action = $_GET[ 'action' ];
    switch($action){
        case "5":
            $ssid = $_GET['ssid'];
            $enable = $_GET['status'];
            $data = ["enable"=>"$enable"];
            dbUpdate("tbl_slideshow",$data ,"ssid = $ssid");
            break;
    }
}

    $result = dbSelect("tbl_slideshow", "*", "", "order by ssorder");
?>
<main class="content">
    <div class="container-fulid p-0">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        <h1 class="h3 mb-3">Slideshow</h1>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>SubTitle</th>
                <th>Text</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
            <?php
                $i=1;
                while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
            <td><?= $i ?></td>
            <td><img src="../images/<?=$row['img'] ?>" style="width: 100px;"></td>
            <td><?=$row['title'] ?></td>
            <td><?=$row['subtitle'] ?></td>
            <td><?=$row['text'] ?></td>
            <td><?=$row['link'] ?></td>
            <td>
                <a href="" ><i class="fas fa-arrow-up"></i></a>
                <a href=""><i class="fas fa-arrow-down"></i></a>
                <a href="index.php?p=slideshow&action=5&status=<?=$row['enable']=='1'?'0':'1'?>&ssid=<?=$row['ssid']?>"><i class="<?=($row['enable']=='1'?'fas fa-eye':'fas fa-eye-slash')?>"></i></a>
                <a href=""><i class="fas fa-trash"></i></a>
                <a href=""><i class="fas fa-edit"></i></a>
            </td>
            </tr>
            <?php 
                $i++;
                }
            ?>
        </table>
    </div>
</main>