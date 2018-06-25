<?php

$conn = new PDO("mysql:host=localhost;dbname=klatring;charset=UTF8", 'root', '');

$stmt = $conn->prepare("SELECT * FROM `aktivitet");

$stmt->execute();



if ($stmt->rowCount() != 0) {

?>
<table style="width:100%">
    <tr>
        <th>idAktivitet</th>
        <th>Aktivitetnavn</th>
        <th>Beskrivelse</th>
        <th>pris</th>
        <th>Tidsbruk</th>

    </tr>
    <?php
    while ($row = $stmt->fetchObject()) {
        echo "<tr>" .
            "<td>" . $row->idAktivitet . "</td>" .
            "<td>" . $row->AktivitetNavn . "</td>" .
            "<td>" . $row->Beskrivelse . "</td>" .
            "<td>" . $row->Pris . "</td>" .
            "<td>" . $row->Tidsbruk . "</td > ";

        echo "<td><a href='meld_pa.php?id=" . $row->idAktivitet . "'>Meld på</a>";

        echo "</tr > ";
    }

    }
    else {
        echo "don't exist records for list on the table";
    }

    ?>
</table>
<input type="button" value="gå til login side" onclick="location='login.php'" />
<input type="button" value="" onclick="location='logout.php'" />
