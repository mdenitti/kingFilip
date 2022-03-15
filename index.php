<?php
require 'vendor/autoload.php';
require 'common.php';
require 'connection.php';

if (isset($_POST['firstName'])) {
   // nu gaan we OOP 
   // Object instantiation with constructor en pass on the data $_POST
   $addGuest = new Addguest($_POST['firstName'],$_POST['lastName'],$_POST['bDate']);
   // print_r($addGuest);

   echo $addGuest->lastid;

   $qrcode = new Imagetools();
   $qrcodeIMG = $qrcode->qrCodeMake($addGuest->lastid);
   echo "<img src='$qrcodeIMG'>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Filip</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <form action="" method="post">

                <div class="mb-3">
                        <label class="form-label">firstName</label>
                        <input type="text" name="firstName" class="form-control" value="Massimo">
                </div>

                <div class="mb-3">
                        <label class="form-label">lastName</label>
                        <input type="text" name="lastName" class="form-control" value="De Nittis">
                </div>

                <div class="mb-3">
                        <label class="form-label">bDate</label>
                        <input type="date" name="bDate" class="form-control" value="2022-03-16">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            </div>
        </div>
    </div>
</body>
</html>