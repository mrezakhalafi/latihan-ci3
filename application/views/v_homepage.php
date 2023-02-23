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

            <div id="h1" class="mb-5" style="font-size: 40px">
                <?= $title ?>
            </div>

            <?php if ($this->session->userdata('id')): ?>

                <div style="color:green; font-weight: bold; font-size: 24px" class="mb-3">
                    Welcome, <?= $this->session->userdata('first_name')?>
                </div>

            <?php endif; ?>

            <?php if ($user): ?>

                <a href="<?= base_url('User') ?>">
                    <button class="btn btn-success">List User</button>
                </a>

                <a href="<?= base_url('Product') ?>">
                    <button class="btn btn-success">List Produk</button>
                </a>

            <?php endif; ?>

            <?php if ($user): ?>

                <a href="<?= base_url('Auth/logout') ?>">
                    <button class="btn btn-danger">Logout</button>
                </a>

            <?php else: ?>

                <a href="<?= base_url('User/formAdd') ?>">
                    <button class="btn btn-success" type="button">Register</button>
                </a>

                <a href="<?= base_url('Auth/loginPage') ?>">
                    <button class="btn btn-success">Login</button>
                </a>

            <?php endif; ?>

        </div>
    </div>
</div>

<!-- </body>
</html> -->