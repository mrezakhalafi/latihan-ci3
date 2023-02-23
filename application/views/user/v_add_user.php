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

            <div class="row">
                <div class="col-4"></div>

                <div class="col-4">

                    <form method="POST" action="<?= base_url('user/sendAdd') ?>" enctype="multipart/form-data">

                        <input class="form-control my-3" type="text" name="first_name" placeholder="First Name" value="<?= set_value('first_name'); ?>">
                        <?= form_error('first_name','<small class="text-danger pl-3">','</small>'); ?> 

                        <input class="form-control my-3" type="text" name="last_name" placeholder="Last Name" value="<?= set_value('last_name'); ?>">
                        <?= form_error('last_name','<small class="text-danger pl-3">','</small>'); ?> 

                        <input class="form-control my-3" type="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?> 

                        <input class="form-control my-3" type="password" name="password" placeholder="Password">
                        <input type="file" name="photo" class="btn btn-secondary">

                        <button class="btn btn-success mt-5" type="submit">Input Data</button>

                        <a href="<?= base_url('Homepage') ?>">
                            <button class="btn btn-secondary mt-5">Back</button>
                        </a>

                    </form>

                </div>

                <div class="col-4"></div>
            </div>

        </div>
    </div>
</div>

<!-- </body>
</html> -->