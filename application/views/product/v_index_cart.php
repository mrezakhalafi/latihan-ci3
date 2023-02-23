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

        <div id="h1" class="mb-5" style="font-size: 25px">
            Jumlah Keranjang : <?= $total_items ?>
        </div>

        <?php 
            foreach($cart as $c): 
        ?>
            
        <div class="row mt-2 mb-2">
            <div class="col-2">
                <img style="width:70px; height: 70px; object-fit: cover; border-radius: 20px" src="<?= base_url() ?>images/<?= $c['media'] ?>">
            </div>
            <div class="col-2 pt-3 text-start">
                <?= $c['name'] ?>
            </div>
            <div class="col-2 pt-3 text-start">
                Rp. <?= rupiah($c['price']) ?>
            </div>
            <div class="col-2">
                <a href="<?= base_url('Product/minQuantity') ?>?id=<?= $c['rowid'] ?>&qty=<?= $c['qty'] ?>">
                    <button class="btn btn-secondary">-</button>
                </a>

                <span class="mx-3"><?= $c['qty'] ?></span>

                <a href="<?= base_url('Product/addQuantity') ?>?id=<?= $c['rowid'] ?>&qty=<?= $c['qty'] ?>">
                    <button class="btn btn-secondary">+</button>
                </a>
            </div>
            <div class="col-2 pt-3">
                Rp. <?= rupiah($c['price'] * $c['qty']) ?>
            </div>
            <div class="col-2">
                <a href="<?= base_url('Product/deleteCart') ?>?id=<?= $c['rowid'] ?>">
                    <button class="btn btn-danger">Delete from Cart</button>
                </a>
            </div>
        </div>

        <?php
            endforeach; 
        ?>

        <h3 class="mt-4">Total : Rp. <?= rupiah($this->cart->total()) ?></h3>

        <a href="<?= base_url('Product') ?>">
            <button class="btn btn-secondary mt-5">Back</button>
        </a>

        </div>
    </div>
</div>

<!-- </body>
</html> -->