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

                <form method="POST" action="<?= base_url('user/sendEdit') ?>" enctype="multipart/form-data">
                    <input class="form-control my-3" type="text" name="first_name" placeholder="First Name" value="<?= $user['FIRST_NAME'] ?>">
                    <input class="form-control my-3" type="text" name="last_name" placeholder="Last Name" value="<?= $user['LAST_NAME'] ?>">
                    <input class="form-control my-3" type="email" name="email" placeholder="Email" value="<?= $user['EMAIL'] ?>">
                    <input class="form-control my-3" type="password" name="password" placeholder="Password">

                    <img id="image-preview" class="mb-3" style="width:300px; height: 300px; border-radius: 20px; object-fit: cover" src="<?= base_url() ?>images/<?= $user['PROFILE_PICTURE'] ?>">

                    <input onchange="previewImage(event)" type="file" name="photo" class="btn btn-secondary">

                    <input type="hidden" name="id" value="<?= $user['ID'] ?>">

                    <button class="btn btn-success mt-5" type="submit">Edit Data</button>

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

<script>

    function previewImage(event){

        const imageElement = document.getElementById("image-preview");

        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(event) {
            const fileData = event.target.result;
            console.log(fileData);
            imageElement.src = fileData;
        };

        reader.readAsDataURL(file);

    }

</script>