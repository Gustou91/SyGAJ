<?php echo $this->Html->css('sygaj_theme'); ?>
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>
<?php echo $this->Html->script('sygaj'); ?>
<?php echo $this->Html->css('vis-network.min.css'); ?>

<?php echo $this->Html->script('vis-network.min.js'); ?>
<?php echo $this->Html->script('vis.js'); ?>

<div class="box">
  <div class="box-header">
  	<?php
  		if (isset($categorie)) {
  			$catid = $categorie->id;
  			$catname = $categorie->cat_nom;
  		} else {
  			$catid = "";
  			$catname = "";
  		}
  	?>
   	<div class="row">
		<div class="input-group col-md-2">
		    <h3 class="box-title">Liste des poules</h3> 
		</div>
	    <div class="input-group col-md-3">
	        <span class="input-group-addon"><i class="fa fa-object-ungroup"></i></span>
	        <?php echo $this->Form->select($catid, $listCateg, [
	          'empty' => '(choisissez la catégorie)',
	          'val' => $catid,
	          'id' => 'listCategoriesCompo'
	          ]); ?>
	    </div>
	    <div class="input-group col-md-1">
	    	<input type="button" id="save_button" onclick="saveNetwork()" value="Sauver"></input>
		</div>
	    <div class="input-group col-md-1">
			<?php 		
				echo $this->Html->link('Imprimer', 
					array('controller' => 'poules', 
					  'action' => 'printPoules?categorie='.$catid, 
					  'ext' => 'pdf'), 
					array( "class"=>"pdf_report", "target"=>"_blank" ));
			?>
		</div>
	</div>
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


	function objectToArray(obj) {
		return Object.keys(obj).map(function (key) {
			obj[key].id = key;
			return obj[key];
		});
	}

	function saveNetwork() {

		alert("Bouton saveNetwork cliqué.");
		var nodes = objectToArray(network.getPositions());
		nodes.forEach(addConnections);
		var exportValue = JSON.stringify(nodes, undefined, 2);
		console.log(exportValue);

		var monUrl = "/SyGAJ/Poules/updatePoules";
		$.ajax({
			type: 'post',
			url: monUrl,
			data: exportValue,
			dataType: 'json',
			success: function (response) {
				console.log("Succès");
				$.each(response, function(index, object){
	                console.log("Index= ".index);
	                console.log(object);
				})
			},
			error : function(resultat, statut, erreur){
					console.log("Erreur");
	                console.log("resultat = ".resultat);
	                console.log("statut = ".statut);
	                console.log("erreur = ".erreur);
			},
			complete : function(resultat, statut){
					console.log("Terminé");
	                console.log("resultat = ".resultat);
	                console.log("statut = ".statut);
			}			
		})
    
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
				echo "nodes.push({id: ".$affectation->id.", label: \"".$affectation->candidat->id." - ".$affectation->candidat->can_nom." ".$affectation->candidat->can_prenom." - ".$affectation->candidat->can_poids."kg\\n".$affectation->candidat->club->clu_nom."\", group: ".$noGroup."});\n";

	
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



