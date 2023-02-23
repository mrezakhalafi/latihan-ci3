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
            foreach($list_product as $lp): 
        ?>
            
        <div class="row mt-2 mb-2">
            <div class="col-3">
                <img style="width:70px; height: 70px; object-fit: cover; border-radius: 20px" src="<?= base_url() ?>images/<?= $lp['MEDIA'] ?>">
            </div>
            <div class="col-2 pt-3 text-start">
                <?= $lp['NAME'] ?>
            </div>
            <div class="col-2 pt-3 text-start">
                Rp. <?= rupiah($lp['PRICE']) ?>
            </div>
            <div class="col-2">
                <button onclick="minCounter('<?= $lp['ID'] ?>')" class="btn btn-secondary">-</button>
                <span id="counter-<?= $lp['ID'] ?>" class="mx-3">1</span>
                <button onclick="addCounter('<?= $lp['ID'] ?>')" class="btn btn-secondary">+</button>
            </div>
            <div class="col-3">
                <a id="add-to-cart-<?= $lp['ID'] ?>" href="<?= base_url('Product/addCart') ?>?id=<?= $lp['ID'] ?>&qty=1">
                    <button class="btn btn-success">Add to Cart</button>
                </a>
            </div>
        </div>

        <?php
            endforeach; 
        ?>
        
        <a href="<?= base_url('Product/listCart') ?>">
            <button class="btn btn-warning mt-5">My Cart</button>
        </a>

        <a href="<?= base_url('Product') ?>">
            <button class="btn btn-secondary mt-5">Back</button>
        </a>

        </div>
    </div>
</div>

<!-- </body>
</html> -->

<script>

    function addCounter(id){
        
        let quantity = parseInt($('#counter-'+id).text());

        quantity = quantity + 1;

        $('#counter-'+id).text(quantity);        

        $('#add-to-cart-'+id).prop('href','<?= base_url('Product/addCart') ?>?id='+id+'&qty='+quantity);

    }

    function minCounter(id){
        
        let quantity = parseInt($('#counter-'+id).text());

        if (quantity > 1){

            quantity = quantity - 1;

            $('#counter-'+id).text(quantity);    

            $('#add-to-cart-'+id).prop('href','<?= base_url('Product/addCart') ?>?id='+id+'&qty='+quantity);
        }    

    }

</script>