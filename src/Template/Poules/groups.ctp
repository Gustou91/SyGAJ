<?php echo $this->Html->css('sygaj_theme'); ?>
<?php echo $this->Html->css('vis-network.min.css'); ?>

<?php echo $this->Html->script('vis-network.min.js'); ?>
<?php echo $this->Html->script('vis.js'); ?>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des poules</h3> 
    <input type="button" id="save_button" onclick="saveNetwork()" value="Sauver"></input>
	<?php echo $this->Html->link('Imprimer', 
		array('controller' => 'poules', 
			  'action' => 'printPoules', 
			  'ext' => 'pdf'), 
		array( "class"=>"pdf_report", "target"=>"_blank" ));
	?>
  </div>

<div id="mynetwork"></div>

<script type="text/javascript">
    var len = undefined;
	var edges = [];
    var nodes = [];
    var saveButton;

    saveButton = document.getElementById('save_button');


    function addConnections(elem, index) {
        // need to replace this with a tree of the network, then get child direct children of the element
        elem.connections = network.getConnectedNodes(index);
    }


	function saveNetwork() {

		alert("Bouton saveNetwork cliqué.");
		var allNodes = nodes.get();
		console.log(allNodes);
    
	}

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
			echo "nodes.push({id: ".$poule->id.", shape:\"box\", label: \"".$poule->id." - ".$poule->category->cat_nom." (".$poule->pou_sexe.")"."\", group: ".$noGroup."});\n";
			$noItem ++;

			# Boucle sur les affectations pour la poule courante.
			foreach ($poule->affectations as $affectation) {

				# Ajout de l'élément candidat.
				echo "nodes.push({id: ".$affectation->id.", label: \"".$affectation->candidat->can_nom." ".$affectation->candidat->can_prenom." - ".$affectation->candidat->can_poids."kg\\n".$affectation->candidat->club->clu_nom."\", group: ".$noGroup."});\n";

	
				# Raccrochage à l'élément poule.
				echo "edges.push({from: ".$affectation->id.", arrows:\"to\", to: ".$poule->id."});\n";

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
    var locales = {
		fr: {
			edit: 'Editer',
			del: 'Supprimer',
			back: 'Retour',
			addNode: 'Ajouter un candidat',
			addEdge: 'Affecter',
			editNode: 'Editer un candidat',
			editEdge: 'Editer une affectation',
			addDescription: 'Cliquer dans un espace vide pour ajoute un nouveau candidat.',
			edgeDescription: 'Cliquer sur un noeud et glisser le lien vers une poule pour les connecter.',
			editEdgeDescription: 'Cliquer sur le point de contôle et faite-le glisser vers une poule pour les connecter.',
			createEdgeError: 'Impossible de lier un connecteur à un cluster',
			deleteClusterError: 'Les clusters ne peuvent pas être supprimés.',
			editClusterError: 'Les clusters ne peuvent pas être édités.'
			}
		}
    var options = {
    	autoResize: true,
  		width: '100%',
  		locale: 'fr',
  		locales: locales,
  		clickToUse: true,
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
		        	//var r = confirm("Do you want to connect the node to itself?");
		        	//if (r === true) {
		        	//	callback(edgeData);
		        	//}
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



