<?php
/*
Title:      index.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

/*
    Siden dette er enkel informasjon som ikke kan missbrukes
    har jeg valgt cookies.
    Informasjonen burde overleve at nettleseren lukkes og åpnes.
    Men informasjonen trenger ikke å lagres noe sikkert sted.
    Hvis en person med en profil skulle vende tilbake til
    nettstedet på en ny maskin vil løsningen ikke fungere.
    Hvis dette skulle fungere ville jeg lagret
    profilen i en database.

    Når brukeren lager profilen opprettes en cookie på maskinen.
    En cookie for hver instilling.
    Når nettstedet åpnes sjekker cookiesene finnes.
    Hvis det finnes skal instillingene brukes,
    om det ikke finnes settes instillingene til en standard.
*/

$myTitle = 'Home';
include 'a_top.php';
?>

<h1>Create profile</h1>
<form action="createCookie.php" method="post">
    <select required name="textcolor">
        <option value="black">Black</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
        <option value="red">Red</option>
    </select>
    <select required name="textfont">
        <option value='"Times New Roman", Times, serif'>"Times New Roman", Times, serif</option>
        <option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
        <option value='"Courier New", Courier, monospace'>"Courier New", Courier, monospace</option>
    </select>
    <select required name="textsize">
        <option value="12">12</option>
        <option value="14">14</option>
        <option value="16">16</option>
        <option value="18">18</option>
    </select>
    <input required type="text" name="myName" placeholder="name">
    <input type="submit" name="submit" value="Save">
</form>

<?php include 'a_bottom.php'; ?>
