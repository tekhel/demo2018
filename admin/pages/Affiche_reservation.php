<?php
$reservationDB = new Vue_reservationDB($cnx);
$liste = $reservationDB->getVue_reservationProduit();
$nbrReservations = count($liste);
?>
<div class="container">
    <h3>Reservation</h3>
    <a href="./pages/imprimer.php"><img src="./images/pdf.jpg"></a>
    <hr>

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">

                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Nom" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Mail" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tel" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Destination" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($liste)) {
                        if ($nbrReservations > 0) {
                            for ($i = 0; $i < $nbrReservations; $i++) {
                                ?>
                                <tr>
                                    <td><?php print $liste[$i]['NOM_CLIENT']; ?></td>
                                    <td><?php print $liste[$i]['EMAIL_CLIENT']; ?></td>
                                    <td><?php print $liste[$i]['TEL_CLIENT']; ?></td>
                                    <td><?php print $liste[$i]['PAYS']; ?></td>
                                    <td><?php print $liste[$i]['DATE']; ?></td>
                                </tr>
                            <?php }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

