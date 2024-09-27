<?php
    $transactions = $this->session->userdata('infoTransac'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In Account</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-body mx-4">
            <div class="container">
                <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
                <div class="row">
                    
                    <ul class="list-unstyled">
                        <li class="text-black"><?= $this->session->userdata('firstName'), " ", $this->session->userdata('lastName') ?></li>
                        <li class="text-muted mt-1"> <?=$this->session->userdata('address')?> </li>
                        <li class="text-muted mt-1"> <?=$this->session->userdata('state')?> </li>
                        <li class="text-muted mt-1"> <?=$this->session->userdata('country')?> </li>
                        <li class="text-muted mt-1"> <?=$this->session->userdata('zip')?> </li>
                        <li class="text-black mt-1"><?=$this->session->userdata('dateTime')?> </li>
                    </ul>
                    <hr>
                    <div class="col-xl-10">
                        <h5><?= $this->session->userdata('product')?></h5>
                    </div>
                    <div class="col-xl-2">
                        <p class="float-end">
                            $<?= $this->session->userdata('totalPriceAmount') / $this->session->userdata('totalTickets') ?>
                        </p>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-xl-10">
                        <p>Number of Tickets</p>
                    </div>
                    <div class="col-xl-2">
                        <p class="float-end"><?=$this->session->userdata('totalTickets')?>
                        </p>
                    </div>
                    <hr>
                </div>
                <div class="row text-black">
                    <div class="col-xl-12">
                        <p class="float-end fw-bold">Total: $<?=$this->session->userdata('totalPriceAmount')?>
                        </p>
                    </div>
                    <hr style="border: 2px solid black;">
                </div>
                <div class="text-center" style="margin-top: 90px;">
                    <form action="" method="post">
                        <input type="hidden" name="back" value="back">
                        <input type="submit" class="w-100 btn btn-lg btn-success" value='Back to Dashboard'>
                    </form>
                    <p class="mt-2 mb-3 text-muted text-center">Reservation - 2024</p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>