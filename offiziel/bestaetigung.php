<!DOCTYPE html>
<html>
    <style>
        @media only screen and (min-width: 600px) {
            .label {
                text-align: right;
            }
            .titel{
                font-family: "Times New Roman";
            }
            .subtitelZwei{
                font-family: "Times New Roman";
            }
        }
        @media only screen and (max-width: 600px) {
            .label {
                margin-left: 5%;
            }
            .input{
                margin-left: 5%;
            }
            .extraAbstand{
                margin-left: 5%;
            }
            .help{
                margin-left: 5%;
            }
            body{
                margin-left: 5%;
            }
            .titel{
                font-size:200%;
                font-weight: 900;
                margin-left:5%;
                font-family: "Times New Roman";
            }
            .subtitelZwei{
                font-size:160%;
                font-weight: 500;
                margin-left:10%;
                font-family: "Times New Roman";
            }
        }
    </style>
    <head>
        <link rel="stylesheet" href="bulma-0.8.0\css\bulma.min.css">
        <link rel="stylesheet" href="bulma-0.8.0\css\bulma.css">
    </head>
    <body>

        <?php
        //error_reporting(E_ALL & ~E_WARNING);
        //Variabel
        //database
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "tieinternational";
        $gender = $_POST['Geschlecht'];
        $surname = $_POST['Nachname'];
        $firstname = $_POST['Vorname'];
        $bday = $_POST['Geburtstag'];
        $school = $_POST['Schule'];
        $class = $_POST['Klasse'];
        $level = $_POST['Niveau'];
        $postcode = $_POST['PLZ'];
        $place = $_POST['Ort'];
        $street = $_POST['Strasse'];
        $housenumber = $_POST['Hausnummer'];
        $additionalstreet = $_POST['ZusatzStrasse'];
        $telefon = $_POST['Telefon'];
        $email = $_POST['E-Mail'];
        //end database
        $apprenticeshipBestaetigung = $_POST['Apprenticeship'];
        $dateBestaetigung = $_POST['Date'];
        $freiePlaetzeBestaetigung = $_POST['FreiePlaetze'];
        $idEventBestaetigung = $_POST['IdEvent'];
        $mobile = "+41 " . $telefon;
        //end Variabel
        // database

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sqlfrei = $conn->prepare("SELECT freiePlaetze FROM event WHERE IDEvent = ?");
        $sqlfrei->bind_param("s", $idEventBestaetigung);
        $sqlfrei->execute();
        $res = $sqlfrei->get_result();
        $row = $res->fetch_assoc();
        $sqlfrei->close();

        if ($row['freiePlaetze'] != "0") {
            $stmt = $conn->prepare("INSERT INTO personen (`Geschlecht`, `Nachname`, `Vorname`, `Geburtstag`, `Schule`, `Klasse`, `Niveau`, `PLZ`, `Ort`, `Strasse`, `Hausnummer`, `Zusatz Strasse`, `Telefon`, `E-Mail`)
                                                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssss", $gender, $surname, $firstname, $bday, $school, $class, $level, $postcode, $place, $street, $housenumber, $additionalstreet, $mobile, $email);
            $stmt->execute();$stmt->close();

            $sqlfreiZwei = $conn->prepare("SELECT IDPerson FROM personen WHERE Telefon = ? AND Geburtstag = ?");
            $sqlfreiZwei->bind_param("ss", $mobile, $bday);
            $sqlfreiZwei->execute();
            $resZwei = $sqlfreiZwei->get_result();
            $rowZwei = $resZwei->fetch_assoc();
            $sqlfreiZwei->close();

            $stmtZwei = $conn->prepare("INSERT INTO zusammenfassung (`PersonID`, `EventID`)
                                                              VALUES (?, ?)");
            $stmtZwei->bind_param("ii", $rowZwei['IDPerson'], $idEventBestaetigung);
            $stmtZwei->execute();$stmtZwei->close();

            $neuFreiePlaetzeBestaetigung = $freiePlaetzeBestaetigung - 1;
            $sql = "UPDATE event SET freiePlaetze = " . $neuFreiePlaetzeBestaetigung . " WHERE IDEvent = " . $idEventBestaetigung . "";
            $stmtTwo = $conn->prepare($sql);
            $stmtTwo->execute();$stmtTwo->close();



            ?>
            <!-- end database -->

            <!--Navbar -->
            <nav class="navbar" color="grey-light">
                <div class="navbar-brand">
                    <a class="navbar-item" href="http://localhost/Module307/offiziel/index.php">
                        <img src="Bilder\Logo.png" alt="TIE Logo">
                    </a>
                </div>
            </nav>
            <!-- end Navbar-->

            <!-- title/Spruch -->
            <div class="columns">
                <div class="column is-one-fifth"></div>
                <div class="column">
                    <div class="titel">
                        Jetzt kannst du noch entscheiden
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-two-fifths"></div>
                <p class="subtitle is-2">
                    <div class="subtitelZwei">
                        Finde heraus was zu dir passt
                    </div>
                </p>
            </div>

            <!-- end title/motto -->
            <div class="columns">
                <div class="column">
                </div>
                <div class="column">
                    <article class="message is-primary">
                        <div class="message-header">
                            <p>Bestätigung</p>
                        </div>
                        <div class="message-body">
                            Hey <?php echo $firstname ?>!</br>
                            Deine Daten wurden erfolgreich zugestellt. Wir melden uns so schnell wie möglich.
                            Bis dahin findest du uns <a href="https://www.tie-international.com">hier</a>!
                            Wir freuen uns dich am <?php echo $dateBestaetigung ?> kennenzulernen und
                            dir einen genaueren Einblick als <?php echo $apprenticeshipBestaetigung ?> zu erschaffen.</br>
                        </div>
                    </article>
                </div>
                <div class="column">
                </div>
            </div>
            <!-- footer -->
            <footer class="footer">
                <div class="content has-text-centered">
                    <p>
                        <strong><a href="https://www.tie-international.com">TIE International</a></strong> by Keerthi ÜK 307
                    </p>
                </div>
                </br></br></br>
            </footer>
            <!-- end  footer -->
            <?php
        }
        else{
            ?>
            <!--Navbar -->
            <nav class="navbar" color="grey-light">
                <div class="navbar-brand">
                    <a class="navbar-item" href="http://localhost/Module307/offiziel/index.php">
                        <img src="Bilder\Logo.png" alt="TIE Logo">
                    </a>
                </div>
            </nav>
            <!-- end Navbar-->
            <!-- title/motto -->
            <div class="columns">
                <div class="column is-one-fifth"></div>
                <div <p class="title is-1">Jetzt kannst du noch entscheiden</p></div>
            </div>
            <div class="columns">
                <div class="column is-two-fifths"></div>
                <p class="subtitle is-2">Finde heraus was zu dir passt </br></br></p>
            </div>
            <!-- end title/motto -->
            <div class="columns">
                <div class="column"></div>
                <div class="column is-three-quarter">
                    <article class="message is-primary">
                        <div class="message-header">
                            <p>Bestätigung</p>
                        </div>
                        <div class="message-body">
                            Hey <?php echo $firstname ?>!</br>
                            Es tut uns leid dir mitzuteilen, dass alle Plätze schon besetzt sind. </br>
                            Wir bitten dich ein anderes Datum auszuwählen.</br>
                            <a href="http://localhost/Module307/offiziel/index.php">Hier</a> kommst du wieder auf Startseite. </br>
                        </div>
                    </article>
                </div>
                <div class="column"></div>
            </div>
            <!-- footer -->
            <footer class="footer">
                <div class="content has-text-centered">
                    <p>
                        <strong><a href="https://www.tie-international.com">TIE International</a></strong> by Keerthi ÜK 307
                    </p>
                </div>
            </footer>
            <!-- end footer -->
            <?php
        }
        $conn->close();
        ?>
    </body>
</html>







