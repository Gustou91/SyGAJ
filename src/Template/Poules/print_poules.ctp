<?= $this->Dompdf->css('sygaj_pdf'); ?>
<div class="box">
	<?php foreach ($poulesList as $poule) { ?>
	<h1 id="titlePdf1"><?php echo $challenge->cha_nom;	?></h1>
	<h1 id="titlePdf2"><?php echo "Poule ".$poule->id." - ".$poule->category->cat_nom." (".$poule->pou_sexe.")";	?></h1><br>
	<table>
		<tr>
			<th align='center' rowspan='2' style="width: 1cm;">N°</th>
			<th align='center' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</th>
			<th align='center' style="width: 1cm;">1</th>
			<th align='center' style="width: 1cm;">3</th>
			<th align='center' rowspan='2'>Repos</th>
			<th align='center' style="width: 1cm;">1</th>
			<th align='center' style="width: 1cm;">2</th>
			<th align='center' rowspan='2'>Repos</th>
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
		<tr>
			<td align='center' rowspan='2' style="width: 1cm;">1</td>
			<td align='left' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' rowspan='2'></td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' rowspan='2'></td>
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
		<tr>
			<td align='center' rowspan='2' style="width: 1cm;">2</td>
			<td align='left' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' rowspan='2'></td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' rowspan='2'></td>
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
		<tr>
			<td align='center' rowspan='2' style="width: 1cm;">3</td>
			<td align='left' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' rowspan='2'></td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' rowspan='2'></td>
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
		<tr>
			<td align='center' rowspan='2' style="width: 1cm;">4</td>
			<td align='left' rowspan='2' style="width: 8cm;">Nom prénom<br>Club</td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' rowspan='2'></td>
			<td align='center' style="width: 1cm;background-color: #000000;"></td>
			<td align='center' style="width: 1cm;"></td>
			<td align='center' rowspan='2'></td>
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
	<DIV STYLE="page-break-before:always"></DIV>
	<?php } ?>
</div>


