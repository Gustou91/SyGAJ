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

    function onAjaxSuccess(response){
    	console.log("Succès");
		$.each(response, function(index, object){
            console.log("Index= "+index);
            console.log(object);
		});
    }

 	function onEdgeEdit(edgeData,callback){

    	let json = JSON.stringify(edgeData);
		var monUrl = "/SyGAJ/Poules/updatePoules";
		console.log("sending changed edge data : " + json);
		$.post(monUrl, json, onAjaxSuccess, "json");
		callback(edgeData);
    }

 	function onDeleteNode(nodeData,callback){

    	let json = JSON.stringify(nodeData);
		var monUrl = "/SyGAJ/Poules/deletePoule";
		console.log("Envoie des données de la poule à supprimer : " + json);
		$.post(monUrl, json, onAjaxSuccess, "json");
		callback(nodeData);
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

				// Ajout de l'élément candidat.
				$image = "/SyGAJ/img/avatar.png";
				$image = $affectation->candidat->can_sexe == "F" ? "/SyGAJ/img/F.png" : "/SyGAJ/img/H.png";

				echo "nodes.push({id: ".$affectation->id.", label: \"".$affectation->candidat->id." - ".$affectation->candidat->can_nom." ".$affectation->candidat->can_prenom." - ".$affectation->candidat->can_poids."kg\\n".$affectation->candidat->club->clu_nom."\", group: ".$noGroup.", image: '".$image."', shape: 'image'});\n";

	
				// Raccrochage à l'élément poule.
				$edge = "{from: ".$affectation->id.", arrows:\"to\", to: ".$poule->id."}";
				$this->log("Edge = ".$edge, "debug");
				echo "edges.push(".$edge.");\n";

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
		   
    		editEdge: onEdgeEdit,
    		addEdge: false,
    		deleteEdge: false,
    		editNode: false,
    		addNode: false,
    		deleteNode: onDeleteNode
		},

    };
    network = new vis.Network(container, data, options);

    network.on("click", function (params) {
        network.editEdgeMode();
    });

</script>
</div>



