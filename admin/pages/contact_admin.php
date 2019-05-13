<?php
$contactDB = new ContactDB($cnx);
$liste = $contactDB->getVue_contact();
$nbrContacts = count($liste);
?>



<div class="container">
    <h3>Contact</h3>
    <hr>
    <a href="./pages/imprimer_contact.php"><img src="./images/pdf.jpg"></a>
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
                        <th><input type="text" class="form-control" placeholder="Texte" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($liste)) {
                        if ($nbrContacts > 0) {
                            for ($i = 0; $i < $nbrContacts; $i++) {
                                ?>
                                <tr>
                                    <td><?php print $liste[$i]['NOM']; ?></td>      
                                    <td><?php print $liste[$i]['MAIL']; ?></td>
                                    <td><?php print $liste[$i]['TEL']; ?></td>
                                    <td><?php print $liste[$i]['TEXTE']; ?></td>
                                    <td><?php print $liste[$i]['DATE_DEMANDE']; ?></td>
                                </tr>
                            <?php }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

