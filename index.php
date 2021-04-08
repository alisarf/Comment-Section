<?php
    require 'action.php';  //passively initates connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment System USing Bootstrap and PHP and MYSQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body class= "bg-dark">
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-lg-5 bg-light rounded mt-2">
                <h4 class="text-center p-2">Write your comment!</h4>
                <form action="index.php" method="POST" class= "p-2">
                    <input type="hidden" name="id" value= "<?= $u_id;?>">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control rounded-o" placeholder="Enter your name..." required value="<?= $u_name; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control rounded-0" placeholder="Write your comments here..." required><?=$u_comment; ?></textarea>
                    </div>
                    <div class="form-group">
                        <?php if($update==true){ ?>
                            <input type="submit" name="update" class="btn btn-success rounded-0" value="Update Comment">
                        <?php } else {?>
                        <input type="submit" name="submit" class="btn btn-primary rounded-0" value="Post Comment">
                        <?php }?>

                        <h5 class="float-right text-success p-2">
                            <?= $msg; ?>
                        </h5>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 rounded bg-light p-3">
                <?php 
                    $sql = "SELECT * FROM comment_table ORDER BY id DESC";
                    $result = $conn->query($sql);
                    while($row = $result-> fetch_assoc()){
                ?>
                <div class="card mb-2 border-secondary">
                    <div class="card-header bg-secondary py-1 text-light">
                        <span class= "font-italic">
                        Posted By : <?= $row['name']?></span>

                        <span class="float-right font-italic">
                        On : <?= $row['cur_date']?>
                        </span>
                        <div class="card-body py-2">
                            <p class="card-text">
                            <?= $row['comment']?>
                            </p>
                        </div>
                        <div class="card-footer py-2">
                            <div class="float-right">
                                <a href="action.php?del=<?=$row['id']?>" class="text-danger mr-2" onclick= "return confirm('Do you want to delete this comment?');" title= "Delete">
                                <i class="fas fa-trash"></i></a>

                                <a href="index.php?edit=<?=$row['id'] ?>" class="text-success" title="Edit">
                                <i class="fas fa-edit"></i></a>

                            </div>
                        </div>
                    </div>
                    <?php }//closing the while loop above?>
                </div>
            </div>
        </div>
    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>