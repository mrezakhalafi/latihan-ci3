<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codeigniter 3</title>
</head>
<body> -->

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12 text-center">

        <div id="h1" class="mb-5" style="font-size: 35px">
            <?= $title ?>
        </div>

        <?php 
            foreach($list_user as $lu): 
        ?>
            
        <div class="row mt-2 mb-2">
            <div class="col-3">
                <img style="width:70px; height: 70px; object-fit: cover; border-radius: 20px" src="<?= base_url() ?>images/<?= $lu['PROFILE_PICTURE'] ?>">
            </div>
            <div class="col-4 pt-3 text-start">
                <?= $lu['FIRST_NAME'].' '.$lu['LAST_NAME'] ?>
            </div>
            <div class="col-5">
                <a href="<?= base_url('User/formEdit') ?>?id=<?= $lu['ID'] ?>">
                    <button class="btn btn-success">Edit</button>
                </a>
                <a href="<?= base_url('User/delete') ?>?id=<?= $lu['ID'] ?>">
                    <button class="btn btn-danger">Delete</button>
                </a>
            </div>
        </div>

        <?php
            endforeach; 
        ?>
        
        <a href="<?= base_url('User/formAdd') ?>">
            <button class="btn btn-warning mt-5">Add Data</button>
        </a>

        <a href="<?= base_url('Homepage') ?>">
            <button class="btn btn-secondary mt-5">Back</button>
        </a>

        </div>
    </div>
</div>

<!-- </body>
</html> -->