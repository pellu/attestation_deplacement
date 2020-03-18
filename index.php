<?php
$date_calendar = new DateTime();
$date_calendar=$date_calendar->format('d/m/Y');

if(empty($_POST)){
  $fichier=".visites";
  $handle=fopen($fichier,'r');
  $content=stream_get_contents($handle);
  $content=intval($content)+1;
  $fichier2=fopen($fichier,"w+");
  fwrite($fichier2,$content);
  fclose($fichier2);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Attestation de déplacement dérogatoire</title>
  <meta name="title" content="Génération attestation de déplacement dérogatoire en PDF">
  <meta name="description" content="Génération d'une attestation de déplacement dérogatoire en application de l'article 1er du décret du 16 mars 2019 contre la propagation du virus Covid-19">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="css/style.css?date=<?=date("H:i:s");?>" rel="stylesheet">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="js/material.min.js"></script>
  <link type="text/css" rel="stylesheet" href="css/bootstrap-material-datetimepicker-bs4.css"/>
  <script type="text/javascript" src="js/bootstrap-material-datetimepicker-bs4-fr.js"></script>
</head>
<body>
  <header>
    <div class="container">
      <div class="pull-center">
        <h1>Attestation de déplacement dérogatoire</h1>
        <p>Remplissez tous les champs, signez et téléchargez le pdf</p>
      </div>
    </div>
  </header>

  <div class="container" id="content">
    <div class="row">
      <div class="col-12 col-lg-6 col-center">
        <div class="alert alert-info text-center">Les informations rentrées dans le formulaire ci-dessous ne sont pas gardées sur le serveur.</div>
        <div class="alert alert-warning text-center">Le site ne fonctionne pas via un navigateur imbriqué style Facebook, Messenger, Discord... Il est conseillé d'utiliser Chrome ou Firefox.</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6 col-center">
        <p class="text-center" style="font-size: 14.5px;">En application de l'article 1<sup>er</sup> du décret du 16 mars 2020 portant réglementation des déplacements dans le cadre de la lutte contre la propagation du virus Covid-19.</p>
        <form class="needs-validation" action="pdf.php" method="POST" novalidate>

          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="firstName">Prénom</label>
                <input type="text" name="prenom" placeholder="Votre prénom" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Champs obligatoire
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="lastName">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Votre nom" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Champs obligatoire
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-lg-4">
              <div class="form-group">
                <label for="civilite">Civilité</label>
                <select class="custom-select d-block w-100" name="civilite" id="civilite" required>
                  <option value="" selected="" disabled="">Choisir...</option>
                  <option>Mme</option>
                  <option>M.</option>
                </select>
                <div class="invalid-feedback">
                  Champs obligatoire
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-8">
              <div class="form-group">
                <label>Date de naissance</label>
                <div class="input-group">
                  <input type="text" class="form-control" rel="date_naissance" id="date_naissance" name="date_naissance" placeholder="Date de naissance" aria-label="date" aria-describedby="date" data-readonly required style="cursor:pointer;">
                  <div class="invalid-feedback">
                    Champs obligatoire
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" placeholder="Votre adresse complète" id="adresse" required>
                <div class="invalid-feedback">
                  Champs obligatoire
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <p class="text-left" style="font-size: 14.5px;">certifie que mon déplacement est lié au motif suivant (cocher la case) autorisé par l'article 1<sup>er</sup> du décret du 16 mars 2020 portant réglementation des déplacements dans le cadre de la luette contre la propagation du virus Covid-19 :</p>
              <div class="alert alert-warning">Veuillez choisir au moins un motif de déplacement</div>
            </div>
          </div>

          <div class="row">
            <div class="col-1">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="travail" class="custom-control-input" id="travail">
                <label class="custom-control-label" for="travail"></label>
              </div>
            </div>
            <div class="col-11">
              <p class="text-left" style="font-size: 14.5px;">déplacements entre le domicile et le lieu d'exercice de l'activité professionnelle, lorsqu'ils sont indispensables à l'exercice d'activités ne pouvant être oraganisées sous forme de télétravail (sur justificatif permanent) ou déplacements professionnels ne pouvant être différés;</p>
            </div>
          </div>

          <div class="row">
            <div class="col-1">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="achats" class="custom-control-input" id="achats">
                <label class="custom-control-label" for="achats"></label>
              </div>
            </div>
            <div class="col-11">
              <p class="text-left" style="font-size: 14.5px;">déplacements pour effectuer des achats de première nécessité dans des établissements autorisés (liste sur gouvernement.fr);</p>
            </div>
          </div>

          <div class="row">
            <div class="col-1">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="sante" class="custom-control-input" id="sante">
                <label class="custom-control-label" for="sante"></label>
              </div>
            </div>
            <div class="col-11">
              <p class="text-left" style="font-size: 14.5px;">déplacements pour motif de santé;</p>
            </div>
          </div>

          <div class="row">
            <div class="col-1">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="enfants" class="custom-control-input" id="enfants">
                <label class="custom-control-label" for="enfants"></label>
              </div>
            </div>
            <div class="col-11">
              <p class="text-left" style="font-size: 14.5px;">déplacements pour motif familial impérieux, pour l'assistance aux personnes vulnérables ou la garde d'enfants;</p>
            </div>
          </div>

          <div class="row">
            <div class="col-1">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="brefs" class="custom-control-input" id="brefs">
                <label class="custom-control-label" for="brefs"></label>
              </div>
            </div>
            <div class="col-11">
              <p class="text-left" style="font-size: 14.5px;">déplacements brefs, à proximité du domicile, liés à l'activité physique individuelle des personnes, à l'exclusion de toute pratique sportive collective, et aux besoins des animaux de compagnie.</p>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label for="ville">Fait à</label>
                <input type="text" name="lieu_signature" placeholder="Indiquer la ville" class="form-control" id="ville" required>
                <div class="invalid-feedback">
                  Champs obligatoire
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label>Date de signature</label>
                <div class="input-group">
                  <input type="text" class="form-control" rel="date_signature" id="date_signature" name="date_signature" placeholder="Date de signature" aria-label="date" aria-describedby="date" data-readonly required style="cursor:pointer;">
                  <div class="invalid-feedback">
                    Champs obligatoire
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="alert alert-warning">Si vous ne signez pas votre attestation de déplacement dérogatoire, elle ne sera pas valide.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <canvas id="sig-canvas">
                Get a better browser, bro.
              </canvas>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-12 col-lg-6">
              <button class="btn btn-primary btn-block" id="sig-submitBtn">Soumettre la signature</button>
            </div> -->
            <div class="col-12 col-lg-6">
              <button class="btn btn-default btn-block" id="sig-clearBtn">Effacer la signature</button>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-12">
              <div class="input-group">
                <input id="sig-dataUrl" name="signature" class="form-control" rows="5" value="" placeholder="Veuillez cliquer sur le bouton pour soumettre la signature" required="" data-readonly style="display: none;">
                <img id="sig-image" src="" style="display: none;">
                <div class="invalid-feedback" style="display: none;">
                  Veuillez cliquer sur le bouton pour soumettre la signature
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button class="btn btn-primary btn-lg btn-block" name="generate_pdf" id="sig-submitBtn" type="submit">Générer le PDF</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    //Date picker
    $('#date_naissance').bootstrapMaterialDatePicker({
      lang: 'fr',
      format: 'DD/MM/YYYY',
      time: false,
      maxDate : '<?=$date_calendar;?>',
      clearButton: false
    });
    $('#date_signature').bootstrapMaterialDatePicker({
      lang: 'fr',
      format: 'DD/MM/YYYY',
      time: false,
      maxDate : '<?=$date_calendar;?>',
      minDate : '<?=$date_calendar;?>',
      clearButton: false
    });
    //Confirmation champs
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    //Signature
    (function() {
      window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimaitonFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
      })();

      var canvas = document.getElementById("sig-canvas");

      canvas.addEventListener("touchstart",  function(event) {event.preventDefault()})
      canvas.addEventListener("touchmove",   function(event) {event.preventDefault()})
      canvas.addEventListener("touchend",    function(event) {event.preventDefault()})
      canvas.addEventListener("touchcancel", function(event) {event.preventDefault()})

      var ctx = canvas.getContext("2d");
      ctx.strokeStyle = "#222222";
      ctx.lineWidth = 4;

      var drawing = false;
      var mousePos = {
        x: 0,
        y: 0
      };
      var lastPos = mousePos;

      canvas.addEventListener("mousedown", function(e) {
        drawing = true;
        lastPos = getMousePos(canvas, e);
      }, false);

      canvas.addEventListener("mouseup", function(e) {
        drawing = false;
      }, false);

      canvas.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas, e);
      }, false);

      // Add touch event support for mobile
      canvas.addEventListener("touchstart", function(e) {

      }, false);

      canvas.addEventListener("touchmove", function(e) {
        var touch = e.touches[0];
        var me = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas.dispatchEvent(me);
      }, false);

      canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var me = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas.dispatchEvent(me);
      }, false);

      canvas.addEventListener("touchend", function(e) {
        var me = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(me);
      }, false);

      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        }
      }

      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        return {
          x: touchEvent.touches[0].clientX - rect.left,
          y: touchEvent.touches[0].clientY - rect.top
        }
      }

      function renderCanvas() {
        if (drawing) {
          ctx.moveTo(lastPos.x, lastPos.y);
          ctx.lineTo(mousePos.x, mousePos.y);
          ctx.stroke();
          lastPos = mousePos;
        }
      }

      // Prevent scrolling when touching the canvas
      document.body.addEventListener("touchstart", function(e) {
        if (e.target == canvas) {
          e.preventDefault();
        }
      }, false);
      document.body.addEventListener("touchend", function(e) {
        if (e.target == canvas) {
          e.preventDefault();
        }
      }, false);
      document.body.addEventListener("touchmove", function(e) {
        if (e.target == canvas) {
          e.preventDefault();
        }
      }, false);

      (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

      function clearCanvas() {
        canvas.width = canvas.width;
      }

      // Set up the UI
      var sigText = document.getElementById("sig-dataUrl");
      var sigImage = document.getElementById("sig-image");
      var clearBtn = document.getElementById("sig-clearBtn");
      var submitBtn = document.getElementById("sig-submitBtn");
      clearBtn.addEventListener("click", function(e) {
        clearCanvas();
        sigText.innerHTML = "Data URL for your signature will go here!";
        sigImage.setAttribute("src", "");
      }, false);
      submitBtn.addEventListener("click", function(e) {
        var dataUrl = canvas.toDataURL();
        sigText.innerHTML = dataUrl;
        document.getElementById("sig-dataUrl").value = dataUrl;
        sigImage.setAttribute("src", dataUrl);
      }, false);
    })();
  </script>
  <footer class="footer">
    <div class="container">
      <div class="text-muted text-center py-3">Conforme RGPD, sans cookie et sans stockage de données - <a href="https://github.com/pellu/attestation_deplacement" target="_blank">Repo GitHub</a> - <a href="https://www.jordanpelluard.fr/" target="_blank"> Jordan Pelluard</a>
      </div>
    </div>
  </footer>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}else{
  $fichier=".generate";
  $handle=fopen($fichier,'r');
  $content=stream_get_contents($handle);
  $content=intval($content)+1;
  $fichier2=fopen($fichier,"w+");
  fwrite($fichier2,$content);
  fclose($fichier2);

  require('fpdf/fpdf.php');

  $pdf = new FPDF('P','mm','A4');
  $pdf->AddPage();
  $pdf->SetCreator("ATTESTATION DE DÉPLACEMENT DÉROGATOIRE");
  $pdf->SetAuthor("ATTESTATION DE DÉPLACEMENT DÉROGATOIRE");
  $pdf->SetTitle(utf8_decode("ATTESTATION DE DÉPLACEMENT DÉROGATOIRE"));

//Title
  $pdf->SetFont('Arial', 'B', 18); 
  $pdf->Cell(190, 25, utf8_decode('ATTESTATION DE DÉPLACEMENT DÉROGATOIRE'), 0, 0, 'C'); 
//Subtitle
  $pdf->SetXY(20, 5);
  $pdf->Ln();
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("En application du l'article 1er du décret du 16 mars 2020 portant réglementation des "), 0, 0, 'C'); 
  $pdf->Ln(); 
  $pdf->Cell(190, 5, utf8_decode("déplacements dans le cadre de la lutte contre la propagation du virus Covid-19."), 0, 0, 'C'); 
  $pdf->Ln();
//Content 
  $pdf->SetXY(20, 50);
  $pdf->SetFont('Arial', 'B', 11); 
  $pdf->Cell(300, 5, utf8_decode("Je soussignée(e)"), 0, 1); 
  $pdf->Ln();
  $pdf->SetXY(20, 60);
  $pdf->SetFont('Arial', '', 11); 
  $pdf->Cell(190, 5, utf8_decode($_POST['civilite']." : ".$_POST['prenom'].' '.$_POST['nom']), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(20, 70);
  $pdf->SetFont('Arial', '', 11); 
  $pdf->Cell(190, 5, utf8_decode('Né(e) le : '.$_POST['date_naissance']), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(20, 80);
  $pdf->SetFont('Arial', '', 11); 
  $pdf->Cell(190, 5, utf8_decode('Demeurant : '.$_POST['adresse']), 0, 0); 
  $pdf->Ln();

//Décret 
  $pdf->SetXY(30, 90);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("certifie que mon déplacement est lié au motif suivant (cocher la case) autorisé"), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(30, 95);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("par l'article 1er du décret du 16 mars 2020 portant réglementation des déplacements"), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(30, 100);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("dans le cadre de la luette contre la propagation du virus Covid-19 :"), 0, 0); 
  $pdf->Ln();

//Checkbox 1
  $pdf->SetXY(30, 115);
  $pdf->SetFont('ZapfDingbats','', 10);
  if(!empty($_POST['travail'])){
    $pdf->Cell(5, 5, '4', 1, 0);
  }else{
    $pdf->Cell(5, 5, '', 1, 0);
  }
  $pdf->SetXY(40, 115);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("déplacements entre le domicile et le lieu d'exercice de l'activité professionnelle, lorsqu'ils sont"), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(40, 120);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("indispensables à l'exercice d'activités ne pouvant être oraganisées sous forme de télétravail"), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(40, 125);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("(sur justificatif permanent) ou déplacements professionnels ne pouvant être différés;"), 0, 0); 
  $pdf->Ln();

//Checkbox 2
  $pdf->SetXY(30, 135);
  $pdf->SetFont('ZapfDingbats','', 10);
 if(!empty($_POST['achats'])){
    $pdf->Cell(5, 5, '4', 1, 0);
  }else{
    $pdf->Cell(5, 5, '', 1, 0);
  }
  $pdf->SetXY(40, 135);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("déplacements pour effectuer des achats de première nécessité dans des établissements"), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(40, 140);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("autorisés (liste sur gouvernement.fr);"), 0, 0); 
  $pdf->Ln();
  
//Checkbox 3
  $pdf->SetXY(30, 150);
  $pdf->SetFont('ZapfDingbats','', 10);
if(!empty($_POST['sante'])){
    $pdf->Cell(5, 5, '4', 1, 0);
  }else{
    $pdf->Cell(5, 5, '', 1, 0);
  }
  $pdf->SetXY(40, 150);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("déplacements pour motif de santé;"), 0, 0); 
  $pdf->Ln();

//Checkbox 4
  $pdf->SetXY(30, 160);
  $pdf->SetFont('ZapfDingbats','', 10);
  if(!empty($_POST['enfants'])){
    $pdf->Cell(5, 5, '4', 1, 0);
  }else{
    $pdf->Cell(5, 5, '', 1, 0);
  }
  $pdf->SetXY(40, 160);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("déplacements pour motif familial impérieux, pour l'assistance aux personnes vulnérables"), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(40, 165);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("ou la garde d'enfants;"), 0, 0); 
  $pdf->Ln();

//Checkbox 5
  $pdf->SetXY(30, 175);
  $pdf->SetFont('ZapfDingbats','', 10);
  if(!empty($_POST['brefs'])){
    $pdf->Cell(5, 5, '4', 1, 0);
  }else{
    $pdf->Cell(5, 5, '', 1, 0);
  }
  $pdf->SetXY(40, 175);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("déplacements brefs, à proximité du domicile, liés à l'activité physique individuelle des personnes,"), 0, 0); 
  $pdf->Ln();
  $pdf->SetXY(40, 180);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("à l'exclusion de toute pratique sportive collective, et aux besoins des animaux de compagnie."), 0, 0); 
  $pdf->Ln();

//Fait à
  $pdf->SetXY(130, 210);
  $pdf->SetFont('Arial', '', 10); 
  $pdf->Cell(190, 5, utf8_decode("Fait à ".$_POST['lieu_signature'].", le ".$_POST['date_signature']), 0, 0); 
  $pdf->Ln();

//Signature
  $pdf->Image($_POST['signature'], 130,220,0,25,'png');
  $pdf->Ln();

  $cheminEnvoi2="attestation_de_deplacement_derogatoire.pdf";
  $pdf->Output($cheminEnvoi2,"D");
  ob_end_flush();
}