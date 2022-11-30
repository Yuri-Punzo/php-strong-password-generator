<!--
Descrizione:
Dobbiamo creare una pagina che permetta ai nostri utenti di 
utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante 
svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. 
Una nostra funzione utilizzerà questo dato per generare una password casuale 
(composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo 
la logica in un file functions.php che includeremo poi nella pagina principale

Milestone 3 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare 
fra numeri, lettere e simboli.
Possono essere scelti singolarmente (es. solo numeri) oppure possono 
essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.

Milestone 4 (BONUS - OPZIONALE)
Invece di visualizzare la password nella index, effettuare un redirect 
ad una pagina dedicata che tramite $_SESSION (documentazione) recupererà la password da mostrare all’utente.
-->

<?php
require __DIR__ . '/functions.php';

if ($_GET['length'] >= 8 && !isset($_GET["check_letters"]) && !isset($_GET["check_letters"]) && !isset($_GET["check_letters"])) {
    $status = 'danger';
    $message = 'Seleziona almeno un tipo di carattere';
} else/* if ($_GET['length'] >= 8) */ {
    //var_dump('length Valida');
    $status = 'success';
    $message = 'Password: ';
    $length = $_GET['length'];
    $letters = $_GET["check_letters"];
    $numbers = $_GET["check_numbers"];
    $specialchars = $_GET["check_special_char"];
    $repeat = $_GET["ripetition"];
    $password = passwordGenerator($length, $letters, $numbers, $specialchars, $repeat);
}
// gestendo con min="8" il valore minimo dell'input numerico non necessito più di questo else
/* else {
    //var_dump('length non valida');
    $status = 'danger';
    $message = 'Lunghezza minima: 8 caratteri';
} */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Strong Password Generator</title>
</head>

<body class="bg-dark">

    <h1 class="py-5 text-center text-white">Strong Password Generator</h1>
    <!-- /header -->
    <div class="container">
        <?php if (isset($_GET['length'])) : ?>
            <div class="alert alert-<?= $status; ?> alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong><?= $message; ?></strong>
                <?php if ($_GET['length'] >= 8) : ?>
                    <?= $password; ?>
                <?php endif ?>
            </div>
            <script>
                var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert)
                })
            </script>
        <?php endif; ?>
    </div>
    <!-- /answer -->
    <div class="container bg-secondary rounded-2 p-4">
        <form action="index.php">
            <div class="row ">
                <div class="col-6 ">
                    <div>
                        <h5>Lunghezza Password:</h5>
                    </div>
                    <div class="pt-4">
                        <h5>Consenti ripetizione di uno o più caratteri:</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <input type="number" name="length" id="length" class="form-control" placeholder="" aria-describedby="helpId" style="width: 120px;" min="8" value="8" max="32"></label>
                    </div>
                    <div class="pt-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ripetition" id="ripetition" value="yes">
                            <label class="form-check-label" for="">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ripetition" id="ripetition" value="no">
                            <label class="form-check-label" for="">
                                No
                            </label>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div>
                            <input class="form-check-input" type="checkbox" value="" name="check_letters" id="check_letters" checked>
                            <label class="form-check-label" for="">
                                Lettere
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" value="" name="check_numbers" id="check_numbers">
                            <label class="form-check-label" for="">
                                Numeri
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" value="" name="check_special_char" id="check_special_char">
                            <label class="form-check-label" for="">
                                Simboli
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-1">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
    <!-- /form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- /bootstrap script -->
</body>

</html>