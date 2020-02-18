<!DOCTYPE html>
<html>
	<style>
	.field {
		margin-right: 20%;
	}
	</style>
	<head>
		<link rel="stylesheet" href="bulma-0.8.0\css\bulma.min.css">
		<link rel="stylesheet" href="bulma-0.8.0\css\bulma.css">
	</head>
	<body>
		<?php
		
		//Variabel
		
		//form
		$name="[A-Za-züöäüèéàèÜÖÄÈÉÀ.-\s]{2,80}";
		$klasse="[A-Za-z0-9üöäüèéàèÜÖÄÈÉÀ.,\s]{1,21}";
		$niveau="[A-Za-z1-3üöäüèéàèÜÖÄÈÉÀ.,\s]{1,5}";
		$plz="[0-9]{4}";
		$hausnummer="[A-Za-z0-9]{1,5}";
		$telefon="[0-9]{9}";
		$email="[A-Za-z0-9üöäüèéàèÜÖÄÈÉÀ\W]{8,200}";
		$geburtstag="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$";
		//end form
		
		$apprenticeship = $_GET['apprenticeship'];
		$date = $_GET['date'];
		
		//end Variabel
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
		
		<!-- title/Spruch -->
		<div class="columns">
		  <div class="column is-one-fifth"></div>
		  <div <p class="title is-1">Jetzt kannst du noch entscheiden</p></div>
		</div>
		<div class="columns">
		  <div class="column is-two-fifths"></div>
		  <p class="subtitle is-2">Finde heraus was zu dir passt </p>
		</div>
		<div class="columns">
		  <div class="column is-half"></div>
		  <p class="subtitle is-3"><?php echo "Du bewirbst dich um eine Schnupperlehre</br> 
			als " . $apprenticeship . " am " . $date . ".";?></p>
		</div>
		</br>
		</br>
		</br>
		
		
		<!-- form -->
		<form action="http://localhost/module307/offiziel/bestaetigung.php" method= "post"> 
		  <div <p class="title is-4" style="margin-left:45%;">Erfasse jetzt deine Daten</p></div></br>
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
					<label class="label">Geschlecht*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
					<div class="control">
					  <label class="radio">
						<input type="radio" name="Geschlecht" value="Frau" required>
						Frau
					  </label>
					  <label class="radio">
						<input type="radio" name="Geschlecht" value="Mann">
						Mann
					  </label>
					  <label class="radio">
						<input type="radio" name="Geschlecht" value="anderes">
						anderes
					  </label>
					</div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Vorname*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $name?>" name="Vorname" placeholder="Max" required>
					<p class="help">Es sind nur Buchstabeen, Leerschläge, - und . erlaubt. Maximale Anzahl Zeichen sind 80.</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Nachname*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $name?>" name="Nachname" placeholder="Müller" required>
					<p class="help">Es sind nur Buchstabeen, Leerschläge, - und . erlaubt. Maximale Anzahl Zeichen sind 80.</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Geburtstag*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
					<input type="text" pattern="<?php echo $geburtstag?>" name="Geburtstag" placeholder="dd/mm/yyyy" required>
				  </p>
				</div>
			  </div>
			</div>
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Schule*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $name?>" name="Schule" placeholder="" required>
					<p class="help">Es sind nur Buchstabeen, Leerschläge, - und . erlaubt. Maximale Anzahl Zeichen sind 80.</p>
				  </div>
				</div>
			  </div>
			</div>	
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Klasse*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $klasse?>" name="Klasse" placeholder="" required>
					<p class="help">Es sind nur Buchstaben, Zahlen, Leerzeichen, . und , erlaubt. Maximale Anzahl Zeichen sind 21.</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Niveau*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $niveau?>" name="Niveau" placeholder="" required>
					<p class="help">Es sind nur Buchstaben, Ziffern von 1-3, Leerzeichen, . und , erlaubt. Maximale Anzahl Zeichen sind 5.</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">PLZ*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $plz?>" name="PLZ" placeholder="" required>
					<p class="help">Es ist nur eine 4-stellige Zahl erlaubt.</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Ort*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $name?>" name="Ort" placeholder="" required>
					<p class="help">Es sind nur Buchstabeen, Leerschläge, - und . erlaubt.</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Strasse*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $name?>" name="Strasse" placeholder="" required>
					<p class="help">Es sind nur Buchstaben, Leerschläge und . erlaubt.</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Hausnummer*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $hausnummer?>" name="Hausnummer" placeholder="" required>
					<p class="help">Es sind nur Buchstaben und Zahlen erlaubt</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">Zusatz Strasse</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<input class="input" type="text" pattern="<?php echo $name?>" name="ZusatzStrasse" placeholder="">
					<p class="help">Es sind nur Buchstaben und Leerschläge erlaubt</p>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label"></div>
			  <div class="field-body">
				<div class="field is-expanded">
				  <div class="field has-addons">
					<p class="control">
					  <a class="button is-static">
						+41
					  </a>
					</p>
					<p class="control is-expanded">
					  <input class="input" type="tel" pattern="<?php echo $telefon?>" name="Telefon" placeholder="Your phone number*" required>
					</p>
				  </div>
				  <p class="help">schreibe das erste Null nicht hin und mache keine Leerschläge</p>
				</div>
			  </div>
			</div>
			
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
				<label class="label">E-Mail*</label>
			  </div>
			  <div class="field-body">
				<div class="field">
				  <p class="control">
					<input class="input" type="email" pattern="<?php echo $email?>" name="E-Mail" required>
				  </p>
				  <p class="help">schreibe eine gültige E-Mail Adresse. Maximale Anzahl Zeichen sind 200.</p>
				</div>
			  </div>
			</div>
			<div class="field is-horizontal">
			  <div class="field-label">
				<!-- Left empty for spacing -->
			  </div>
			  <div class="field-body">
				<div class="field">
				  <div class="control">
					<button class="button is-primary">
					<!--  <input type="submit" value="abschicken" />-->
					abschicken
					</button>
				  </div>
				</div>
			  </div>
			</div>
		</form>
		<!-- end form -->
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
	</body>
</html>