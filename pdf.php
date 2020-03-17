<?php
if(isset($_POST['generate_pdf'])){
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
}else{
	header("Location:index.php");
}