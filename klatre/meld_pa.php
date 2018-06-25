<?php
/**
 * Created by PhpStorm.
 * User: jens'
 * Date: 23/06/2018
 * Time: 16:28
 */
session_start();
$conn = new PDO("mysql:host=localhost;dbname=klatring;charset=UTF8", 'root', '');

var_dump($_REQUEST);

if(isset($_REQUEST['Deltakersfornavn'], $_REQUEST['deltakeretternavn'])){
    $stmt = $conn->prepare( "INSERT INTO `deltaker` (DeltakerFornavn, DeltakerMobilnr, DeltakerGateadresse, DeltakerEtternavn, Post_Postnummer) VALUES (:fornavn,:mobil,:adresse,:Etternavn,:postnr )");
$stmt->execute ([
    'fornavn' => $_REQUEST['Deltakersfornavn'],
    'mobil' => $_REQUEST['deltakermobilnr'],
    'adresse' => $_REQUEST['deltakerGateadresse'],
    'postnr' => $_REQUEST['post_postnummer'],
    'Etternavn' => $_REQUEST['deltakeretternavn'],

]);
    header('Location: pa_melding_lagret.php');

}

?>


<h1>Meld deg på [AktivitetNavn]</h1>
<form>
    <input type="text" name="Deltakersfornavn" placeholder="Deltakersfornavn"/>
    <br/>
    <input type="text" name="deltakeretternavn" placeholder="deltakeretternavn"/>
    <br/>
    <input type="text" name="deltakermobilnr" placeholder="Deltakermobilnr"/>
    <br/>
    <input type="text" name="deltakerGateadresse" placeholder="deltakerGateadresse"/>
    <br/>
    <input type="text" name="post_postnummer" placeholder="Post_Postnummer"/>
    <br/>
    <br/>

    <input type="submit" value="Meld_på"/>
</form>