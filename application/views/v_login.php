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

                <div class="row">

                    <div class="col-4"></div>

                    <div class="col-4">

                        <?php if ($this->session->flashdata('message')): ?>
                            
                            <div style="color:red">
                                <?= $this->session->flashdata('message'); ?>
                            </div>

                        <?php endif; ?>

                        <form method="POST" action="<?= base_url('auth/sendLogin') ?>">

                            <input class="form-control my-3" type="email" name="email" placeholder="Email">
                            <input class="form-control mt-3 mb-5" type="password" name="password" placeholder="Password">
                            <button class="btn btn-success" type="submit">Login</button>

                        </form>

                    </div>

                    <div class="col-4"></div>

                </div>

            </div>
        </div>
    </div>

<!-- </body>
</html> -->