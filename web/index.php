<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <!-- source css code, imported from outside -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>

    <!-- this is list news section -->
    <div class="container mt-5">
        <h3>List of News</h3>
        <div class="row">
            <?php
            include 'admin/com/com-connect.php';
            $no = 1;
            $data = mysqli_query($conn, "select * from news where newsStatus=1 order by newsId desc");

            while ($dataNews = mysqli_fetch_array($data)) {
            ?>
                <div class="col-3">
                    <img class="rounded-4" style="object-fit: cover; width: 100%; aspect-ratio: 1/1" src="assets/news/<?php print $dataNews['newsDirectory']; ?>/<?php print $dataNews['newsPhoto']; ?>" alt="" />
                    <p class="mt-3">
                        <b><?php print $dataNews['newsTittle']; ?> |
                            <?php $tanggal = $dataNews['newsDate'];
                            $pecah_tgl = explode("-", $tanggal);
                            $thn = $pecah_tgl[0];
                            $bln = $pecah_tgl[1];
                            $tgl = $pecah_tgl[2];
                            $cd =  $tgl . "-" . $bln . "-" . $thn;
                            print $cd
                            ?></b> <br />
                        <?php print $dataNews['newsContent']; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- source javascript is needed to make dynamic components work using a javascript language imported from outside -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>