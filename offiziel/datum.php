<!DOCTYPE html>
<html>
<style>

</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bulma-0.8.0\css\bulma.min.css">
    <link rel="stylesheet" href="bulma-0.8.0\css\bulma.css">
</head>
<body>
    <?php
    //error_reporting(E_NOTICE);
    //database
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "tieinternational";

    //Variable Get
    $idEvent = $_GET['idEvent'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } ?>
<!-- START NAV -->
<nav class="navbar is-white">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item brand-text" href="privat.php">
                Tie International
            </a>
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="privat.php">
                    Alle
                </a>
                <a class="navbar-item" href="infomatikerAppi.php">
                    Infomatiker Appi
                </a>
                <a class="navbar-item" href="mediamatiker.php">
                    Mediamatiker
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- END NAV -->
<div class="container">
    <div class="column is-9">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Hallo, Tie Mitglied.
                    </h1>
                    <h2 class="subtitle">
                        I hope you are having a great day!
                    </h2>
                </div>
            </div>
        </section>
        <?php
        $sqlfreiZwei = $conn->prepare("SELECT freiePlaetze, MaxPlaetze FROM event WHERE IDEvent = ?");
        $sqlfreiZwei->bind_param("i", $idEvent);
        $sqlfreiZwei->execute();
        $resZwei = $sqlfreiZwei->get_result();
        $rowZwei = $resZwei->fetch_assoc();
        $sqlfreiZwei->close();

        $teilnehmer = $rowZwei['MaxPlaetze'] - $rowZwei['freiePlaetze'];
        ?>
        <section class="info-tiles">
            <div class="tile is-ancestor has-text-centered">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title"><?php echo " " . $teilnehmer . " ";?></p>
                        <p class="subtitle">Teilnehmer</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title"><?php echo " " . $rowZwei['freiePlaetze'] . " ";?></p>
                        <p class="subtitle">freie Plätze</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title"><?php echo " " . $rowZwei['MaxPlaetze'] . " ";?></p>
                        <p class="subtitle">ingesammt Plätze</p>
                    </article>
                </div>
            </div>
        </section>
        <div class="columns">
            <div class="column is-24">
                <div class="card events-card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Teilnehmer
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                            <span class="icon">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </a>
                    </header>
                    <div class="card-table">
                        <div class="content">
                            <table class="table is-fullwidth is-striped">
                                <tbody>
                                <?php
                                $sql = $conn->prepare("SELECT personen.Geschlecht, personen.Nachname, personen.Vorname, personen.Geburtstag, personen.Schule,
                                personen.Klasse, personen.Niveau, personen.PLZ, personen.Ort, personen.Strasse, personen.Hausnummer, 
                                personen.ZusatzStrasse, personen.Telefon, personen.EMail
                                FROM personen JOIN zusammenfassung on personen.IDPerson = zusammenfassung.PersonID WHERE EventID = ?");
                                $sql->bind_param("i", $idEvent);
                                if ($sql->execute()) {
                                    $result = $sql->get_result();

                                    // output data of each row
                                    echo "<tr>";
                                    while($row = $result->fetch_assoc()) {

                                        echo "
                                                    <td width=\"5%\"><i class=\"fa fa-bell-o\"></i></td>
                                                    <td>" . $row['Geschlecht'] . "</td>
                                                    <td>" . $row['Nachname'] . "</td>
                                                    <td>" . $row['Vorname'] . "</td> 
                                                    <td>" . $row['Telefon'] . "</td>
                                                    <td>" . $row['EMail'] . "</td></tr>";
                                        /*<td>" . $row['Geburtstag'] . "</td>
                                                    <td>" . $row['Schule'] . "</td>
                                                    <td>" . $row['Klasse'] . "</td>
                                                    <td>" . $row['Niveau'] . "</td>
                                                    <td>" . $row['PLZ'] . "</td>
                                                    <td>" . $row['Ort'] . "</td>
                                                    <td>" . $row['Strasse'] . "</td>
                                                    <td>" . $row['Hausnummer'] . "</td>
                                                    <td>" . $row['ZusatzStrasse'] . " </td>*/
                                    }
                                    $conn = null;
                                }
                                else{
                                    echo "<td> momentan hat sich noch keiner angemeldet </td>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong><a href="https://www.tie-international.com">TIE International</a></strong> by Keerthi ÜK 307
        </p>
    </div>
</footer>
</body>
</html>