<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
require 'config.php';
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Buy a ticket</title>
    <link rel="stylesheet" type="text/css" href="../css/app.css">
</head>

<body>
    <main class="py-4">
        <div class="container">

        </div>
        <h1>Football ticket for (Uganda cranes Vs Harampe stars)</h1>
        <hr>
        <?php
        $tickets = "SELECT * FROM tickets";
        $records = $dbConnection->query($tickets);
        ?>
        <div class="row">
            <?php
            foreach ($records as $key => $value) {
                $id = $value['id'];
                $name = $value['name'];
                $price = $value['price'];
            ?>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xl-6">
                    <h3> <?php echo $name ?> </h3>
                    <hr>
                    <strong>UGX<?php echo $price ?> </strong><br>
                    <a href="pay_ticket.php?id=<?php echo $id ?>" class="btn btn-success">Pay ticket</a>
                </div>

            <?php
            }
            ?>
        </div>
    </main>
</body>

</html>