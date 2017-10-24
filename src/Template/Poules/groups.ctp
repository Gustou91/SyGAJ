<?php echo $this->Html->css('sygaj_theme'); ?>
<?php echo $this->Html->css('vis-network.min.css'); ?>

<?php echo $this->Html->script('vis-network.min.js'); ?>
<?php echo $this->Html->script('vis.js'); ?>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des poules</h3> 
  </div>
      <?php
    	/*$cpt = 0;
    	$noGroup = 0;
    	$pouleId = -1;
    	foreach ($poulesList as $poule) {
    		$label = $poule->id != $pouleId ? $poule->id : $poule->affectations->aff_idcandidat;
    		echo "{id: ".$cpt.", label: \"".$label.", group: ".$noGroup."},";
    	}*/
    ?>
<div id="mynetwork"></div>

<script type="text/javascript">
    var len = undefined;
	var edges = [];
    var nodes = [];

    <?php
	    $noItem = 0;
	    $noGroup = 0;

		foreach ($poulesList as $poule) {

			echo "console.log($poule->id);\n";

			# Changement de poule.
			$noGroup = $noItem;

			# Ajout du nouvel élément Poule.
			#echo "nodes.push({id: ".$noItem.", label: \"".$poule->id."/".$poule->category->cat_adeb."\", group: ".$noGroup."});\n";
			#echo "nodes.push({id: ".$noItem.", label: \"".$poule->id." - ".$poule->category->cat_nom."\n".$poule->category->cat_adeb."/".$poule->category->cat_afin."\", group: ".$noGroup."});\n";
			echo "nodes.push({id: ".$noItem.", label: \"".$poule->id." - ".$poule->category->cat_nom." (".$poule->pou_sexe.")"."\", group: ".$noGroup."});\n";
			$noItem ++;

			# Boucle sur les affectations pour la poule courante.
			foreach ($poule->affectations as $affectation) {

				# Ajout de l'élément candidat.
				echo "nodes.push({id: ".$noItem.", label: \"".$affectation->candidat->can_nom." ".$affectation->candidat->can_prenom." - ".$affectation->candidat->can_poids."kg\\n".$affectation->candidat->club->clu_nom."\", group: ".$noGroup."});\n";

	
				# Raccrochage à l'élément poule.
				echo "edges.push({from: ".$noItem.", to: ".$noGroup."});\n";

				$noItem ++;

			}

		}
    ?>


    // create a network
    var container = document.getElementById('mynetwork');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {
    	autoResize: true,
  		width: '100%',
        nodes: {
            shape: 'dot',
            size: 20,
            font: {
                size: 12
            },
            borderWidth: 2,
            shadow:true
        },
        edges: {
            width: 2,
            shadow:true
        },
        manipulation: {
		    addEdge: function(edgeData,callback) {
		    	if (edgeData.from === edgeData.to) {
		        	var r = confirm("Do you want to connect the node to itself?");
		        	if (r === true) {
		        		callback(edgeData);
		        	}
		      	}
		      	else {
		        	callback(edgeData);
		    	}
    		},
    		editEdge: true,
    		addNode: false
		}  

    };
    network = new vis.Network(container, data, options);
</script>
</div>



