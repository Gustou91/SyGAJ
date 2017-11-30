<?php echo $this->Dompdf->css('sygaj_pdf'); ?>
<?php //echo $this->Html->css('sygaj_pdf'); ?>

<div class="box">

	<?php foreach ($poulesList as $poule) { 

		/*$listCandidats = $poule->affectations;
		debug(count($listCandidats));
		die();*/
		

		// Boucle sur les candidats affectés à la poule courante.
		$rowList = array();
		foreach ($poule->affectations as $affectation) {
			// Stockage des données dans un tableau.
			$rowFiche = array('Nom' => $affectation->candidat->can_nom." ".$affectation->candidat->can_prenom,
							  'Club' => $affectation->candidat->club->clu_nom);
			array_push($rowList, $rowFiche);
		}
	?>
	<h1 id="titlePdf1"><?php echo $challenge->cha_nom;	?></h1>
	<h1 id="titlePdf2"><?php echo "Poule ".$poule->id." - ".$poule->category->cat_nom." (".$poule->pou_sexe.")"." - ".count($poule->affectations)." membres";	?></h1><br>



	<!-- Poule de 1 -->
	<?php if ( count($poule->affectations) == 1 ) { 
		echo "<br><br><br><br><br><h1 id=\"error\">".$rowList[0]["Nom"]." doit être affecté(e) à une autre poule.</h1>";		
	} ?>


	<!-- Poule de 2 -->
	<?php if ( count($poule->affectations) == 2 ) { ?>

		<table>
			<!-- Entête -->
			<tr>
				<th align='center' rowspan='2' style="width: 1cm;">N°</th>
				<th align='center' rowspan='2' style="width: 13cm;">Nom prénom<br>Club</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' rowspan='2' style="width: 3cm;">Points</th>
				<th align='center' rowspan='2' style="width: 3cm;">Victoire</th>
				<th align='center' rowspan='2' style="width: 3cm;">Classement</th>
			</tr>
			<tr>
				<th align='center'>2</th>
			</tr>

			<!-- Ligne 1 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">1</td>
				<td align='left' rowspan='2' style="width: 13cm;"><?php echo $rowList[0]["Nom"]."<br>".$rowList[0]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
			</tr>

			<!-- Ligne 2 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">1</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[0]["Nom"]."<br>".$rowList[0]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
			</tr>
		</table>
	<?php } ?>


	<!-- Poule de 3 -->	
	<?php if ( count($poule->affectations) == 3 ) { ?>
		<table>
			<!-- Entête -->
			<tr>
				<th align='center' rowspan='2' style="width: 1cm;">N°</th>
				<th align='center' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">3</th>
				<th align='center' rowspan='8'>Repos</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">2</th>
				<th align='center' rowspan='8'>Repos</th>
				<th align='center' style="width: 1cm;">2</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' rowspan='2'>Points</th>
				<th align='center' rowspan='2'>Victoire</th>
				<th align='center' rowspan='2'>Classement</th>
			</tr>
			<tr>
				<th align='center'>2</th>
				<th align='center' style="background-color: #000000;"></th>
				<th align='center'>3</th>
				<th align='center' style="background-color: #000000;"></th>
				<th align='center'>3</th>
				<th align='center' style="background-color: #000000;"></th>
			</tr>

			<!-- Ligne 1 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">1</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[0]["Nom"]."<br>".$rowList[0]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>

			<!-- Ligne 2 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">2</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[1]["Nom"]."<br>".$rowList[1]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>

			<!-- Ligne 3 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">3</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[2]["Nom"]."<br>".$rowList[2]["Club"] ?></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>
		</table>
	<?php } ?>



	<!-- Poule de 4 -->
	<?php if ( count($poule->affectations) == 4 ) { ?>
		<table>
			<!-- Entête -->
			<tr>
				<th align='center' rowspan='2' style="width: 1cm;">N°</th>
				<th align='center' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">3</th>
				<th align='center' rowspan='10'>Repos</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">2</th>
				<th align='center' rowspan='10'>Repos</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">2</th>
				<th align='center' rowspan='2'>Points</th>
				<th align='center' rowspan='2'>Victoire</th>
				<th align='center' rowspan='2'>Classement</th>
			</tr>
			<tr>
				<th align='center'>2</th>
				<th align='center'>4</th>
				<th align='center'>3</th>
				<th align='center'>4</th>
				<th align='center'>4</th>
				<th align='center'>3</th>
			</tr>

			<!-- Ligne 1 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">1</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[0]["Nom"]."<br>".$rowList[0]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>
			
			<!-- Ligne 2 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">2</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[1]["Nom"]."<br>".$rowList[1]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
			</tr>
			
			<!-- Ligne 3 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">3</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[2]["Nom"]."<br>".$rowList[2]["Club"] ?></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
			</tr>
			
			<!-- Ligne 4 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">4</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[3]["Nom"]."<br>".$rowList[3]["Club"] ?></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>
		</table>
	<?php } ?>


	<!-- Poule de 5 -->
	<?php if ( count($poule->affectations) == 5 ) { ?>
		<table>
			<!-- Entête -->
			<tr>
				<th align='center' rowspan='2' style="width: 1cm;">N°</th>
				<th align='center' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">2</th>
				<th align='center' style="width: 1cm;">4</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">3</th>
				<th align='center' style="width: 1cm;">2</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' style="width: 1cm;">3</th>
				<th align='center' style="width: 1cm;">2</th>
				<th align='center' style="width: 1cm;">1</th>
				<th align='center' rowspan='2'>Points</th>
				<th align='center' rowspan='2'>Victoire</th>
				<th align='center' rowspan='2'>Classement</th>
			</tr>
			<tr>
				<th align='center'>4</th>
				<th align='center'>3</th>
				<th align='center'>5</th>
				<th align='center'>2</th>
				<th align='center'>5</th>
				<th align='center'>4</th>
				<th align='center'>5</th>
				<th align='center'>4</th>
				<th align='center'>5</th>
				<th align='center'>3</th>
			</tr>

			<!-- Ligne 1 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">1</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[0]["Nom"]."<br>".$rowList[0]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
			</tr>

			<!-- Ligne 2 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">2</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[1]["Nom"]."<br>".$rowList[1]["Club"] ?></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>

			<!-- Ligne 3 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">3</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[2]["Nom"]."<br>".$rowList[2]["Club"] ?></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
			</tr>

			<!-- Ligne 4 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">4</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[3]["Nom"]."<br>".$rowList[3]["Club"] ?></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>

			<!-- Ligne 5 -->
			<tr>
				<td align='center' rowspan='2' style="width: 1cm;">5</td>
				<td align='left' rowspan='2' style="width: 8cm;"><?php echo $rowList[3]["Nom"]."<br>".$rowList[3]["Club"] ?></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' style="width: 1cm;"></td>
				<td align='center' style="width: 1cm;background-color: #000000;"></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
				<td align='center' rowspan='2'></td>
			</tr>
			<tr>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
				<td align='center'></td>
				<td align='center' style="background-color: #000000;"></td>
			</tr>
		</table>
	<?php } ?>


	<DIV STYLE="page-break-before:always"></DIV>
	<?php } ?>


	<!-- Les poules supérieures à 5 membres ne sont pas gérées. -->
	<?php if ( isset($poule) && count($poule->affectations) > 5 ) { 
		echo "<br><br><br><br><br><h1 id=\"error\">".$rowList[0]["Nom"]." doit être affecté(e) à une autre poule.</h1>";		
	} ?>


</div>
