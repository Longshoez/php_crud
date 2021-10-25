<?php include "logic.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>

    <div class="container mt-5">

        <?php if (isset($_REQUEST['info'])) { ?>
            <?php if ($_REQUEST['info'] == 'post_added') { ?>
                <div class="alert alert-success" role="alert">
                    New post added
                </div>
            <?php }else if($_REQUEST['info'] == 'post_updated'){ ?>            
                <div class="alert alert-success" role="alert">
                    Post updated
                </div>
            <?php }else if($_REQUEST['info'] == 'post_deleted'){ ?>            
                <div class="alert alert-danger" role="alert">
                    Post deleted
                </div>
            <?php } ?>
        <?php } ?>

        <div class="text-center">
            <a href="create.php" class="btn btn-outline-dark">Create post +</a>
        </div>

        <!-- Get all posts with a for-each -->
        <div class="row">
            <?php foreach($query as $q) { ?>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <div class="card text-white bg-dark mt-5">                        
                        <div class="card-body style="width: 18rem;">
                            <h5 class="card-title"> <?php echo $q['title'] ?> </h5>
                            <p class="card-text"> <?php echo $q['content'] ?> </p>
                            <a href="view.php?id=<?php echo $q['id']?>" class="btn btn-light">Read more</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>