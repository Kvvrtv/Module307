<!DOCTYPE html>
           <html>
           	<style>

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

                  echo "Beruf: " . $apprenticeshipBestaetigung . " | Datum: " . $dateBestaetigung . " | freie Plätze: " . $freiePlaetzeBestaetigung . " | IDEvent: " . $idEventBestaetigung .
                   " | Geschlecht: " . $gender. " | Nachname: " . $surname . " | Vorname: " . $firstname . " | Bday: " . $bday . " | Schule: " . $school . " | Klasse: " . $class . " | Niveau: " . $level .
                   " | PLZ: " . $postcode . " | Ort: " . $place . " | Strasse: " . $street . " | Hausnummer: " . $housenumber . " | ZusatzStrasse: " . $additionalstreet . " | Telefon: " . $mobile . " | E-Mail: " . $email;

                  // echo " IDEvent Typ: ", gettype($idEventBestaetigung), "\n";


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
                   /*foreach ($conn->query($sql) as $row) {
				   echo ".$row['Datum'].";
                   }*/
				   echo "</br></br></br>" . $row['freiePlaetze'] . "</br></br></br>";

                   if ($row['freiePlaetze'] != "0") {
                   	// output data of each row
                   //try{
                   // else{
                    /* $statement = $conn->prepare("SELECT freiePlaetze FROM `event` WHERE IDEvent = ?");
                     $statement->bind_param( "s", $idEventBestaetigung);
                     $statement->execute();
                     $resultfreiePlaetze = $statement->get_result();
                     $value = $resultfreiePlaetze->fetch_field_direct(0);
                     $resultfreiePlaetze -> free_result();
                     //strval($resultfreiePlaetze);
                     $statement->close();

                     echo '</br></br></br>' . $value -> name;

                     $result = $statement->get_result();
                     echo "freiePlaetze: " . $result;

                     while($row = $result->fetch_assoc()) {
                       echo $row->freiePlaetze;
                     }
                     $query = mysqli_query("SELECT freiePlaetze FROM `event` WHERE IDEvent = " . $idEventBestaetigung);
                     $row = mysqli_fetch_row($query);
                     }
                    catch(PDOException $e) {
                     echo "Error: " . $e->getMessage();
                    } */
                    //if ('freiePlaetze' != "0"){
                           // prepare sql and bind parameters
                           /* $stmt = $conn->prepare("INSERT INTO personen (`Geschlecht`, `Nachname`, `Vorname`, `Geburtstag`, `Schule`, `Klasse`, `Niveau`, `PLZ`, `Ort`, `Strasse`, `Hausnummer`, `Zusatz Strasse`, `Telefon`, `E-Mail`)
                           VALUES (:gender, :surname, :firstname, :bday, :school, :class, :level, :postcode, :place, :street, :housenumber, :additionalstreet, :mobile, :email)"); */
                           $stmt = $conn->prepare("INSERT INTO personen (`Geschlecht`, `Nachname`, `Vorname`, `Geburtstag`, `Schule`, `Klasse`, `Niveau`, `PLZ`, `Ort`, `Strasse`, `Hausnummer`, `Zusatz Strasse`, `Telefon`, `E-Mail`)
                                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                           $stmt->bind_param("ssssssssssssss", $gender, $surname, $firstname, $bday, $school, $class, $level, $postcode, $place, $street, $housenumber, $additionalstreet, $mobile, $email);
                           /*$stmt->bindParam(':surname', $surname);
                           $stmt->bindParam(':firstname', $firstname);
                           $stmt->bindParam(':bday', $bday);
                           $stmt->bindParam(':school', $school);
                           $stmt->bindParam(':class', $class);
                           $stmt->bindParam(':level', $level);
                           $stmt->bindParam(':postcode', $postcode);
                           $stmt->bindParam(':place', $place);
                           $stmt->bindParam(':street', $street);
                           $stmt->bindParam(':housenumber', $housenumber);
                           $stmt->bindParam(':additionalstreet', $additionalstreet);
                           $stmt->bindParam(':mobile', $mobile);
                           $stmt->bindParam(':email', $email);*/
                           $stmt->execute();$stmt->close();
                       //}
                       /*catch(PDOException $e) {
                           echo "Error: " . $e->getMessage();
                       }*/

                       //try{
                          $neuFreiePlaetzeBestaetigung = $freiePlaetzeBestaetigung - 1;

                          $sql = "UPDATE event SET freiePlaetze = " . $neuFreiePlaetzeBestaetigung . " WHERE IDEvent = " . $idEventBestaetigung . "";

                          $stmtTwo = $conn->prepare($sql);
                          $stmtTwo->execute();$stmtTwo->close();
                       //}
                       /*catch(PDOException $e){
                            echo "Error2: " . $e->getMessage();
                       }*/
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
                                   Deine Daten wurden erfolgreich zugestellt. Wir melden uns so schnell wie möglich.
                                   Bis dahin findest du uns <a href="https://www.tie-international.com">hier</a>!
                                   Wir freuen uns dich am <?php echo $dateBestaetigung ?> kennenzulernen und
                                   dir einen genaueren Einblick als <?php echo $apprenticeshipBestaetigung ?> zu erschaffen.</br>
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
                           </br></br></br>
                         </footer>
                         <!-- end footer -->
                   <?php
                   }
                   $conn->close();
                   ?>
           		<!-- try {
           			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           			// set the PDO error mode to exception
           			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING, PDO::ERRMODE_EXCEPTION);
           			$sql = $conn->prepare("INSERT INTO personen (`Geschlecht`, `Nachname`, `Vorname`, `Geburtstag`, `Schule`, `Klasse`, `Niveau`, `PLZ`, `Ort`, `Strasse`, `Hausnummer`, `Zusatz Strasse`, `Telefon`, `E-Mail`)
           			VALUES (:gender, :surname, :firstname, :bday, :school, :class, :level, :postcode, :place, :street, :housenumber, :additionalstreet, :mobile, :email)");
           			$sql->bindParam(':gender', $gender);
           			$sql->bindParam(':surname', $surname);
           			$sql->bindParam(':firstname', $firstname);
           			$sql->bindParam(':bday', $bday);
           			$sql->bindParam(':school', $school);
           			$sql->bindParam(':class', $class);
           			$sql->bindParam(':level', $level);
           			$sql->bindParam(':postcode', $postcode);
           			$sql->bindParam(':place', $place);
           			$sql->bindParam(':street', $street);
           			$sql->bindParam(':housenumber', $housenumber);
           			$sql->bindParam(':additionalstreet', $additionalstreet);
           			$sql->bindParam(':mobile', $mobile);
           			$sql->bindParam(':email', $email);
           			// use exec() because no results are returned
           			$conn->exec($sql);
           			$conn = null;
           		}
           		catch (PDOException $e) {
           			echo $sql . "<br>" . $e->getMessage();
           			print_r($sql->errorInfo());
           		} -->
	</body>
</html>