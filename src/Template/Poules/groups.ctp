<?php echo $this->Html->css('sygaj_theme'); ?>
<?php echo $this->Html->css('vis-network.min.css'); ?>

<?php echo $this->Html->script('vis-network.min.js'); ?>

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

    var nodes = [{id: 0, label: "0", group: 0},
        {id: 1, label: "Pauline CHAILLOT", group: 0},
        {id: 2, label: "Valentine JEAN", group: 0},
        {id: 3, label: "Eve FERON", group: 0},
        {id: 4, label: "Clémentine DADOU", group: 0},
		{id: 5, label: "1", group: 1},
		{id: 6, label: "Léona ALBERNAZ", group: 1},
		{id: 7, label: "Mélina FABRI", group: 1},
		{id: 8, label: "Léna SITAUD", group: 1},
		{id: 9, label: "Albane BOSQUEL", group: 1},
    ];
    var edges = [{from: 1, to: 0},
        {from: 2, to: 0},
        {from: 3, to: 0},
        {from: 4, to: 0},
		{from: 6, to: 5},
		{from: 7, to: 5},
		{from: 8, to: 5},
		{from: 9, to: 5}
    ]

    // create a network
    var container = document.getElementById('mynetwork');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {
        nodes: {
            shape: 'dot',
            size: 20,
            font: {
                size: 10
            },
            borderWidth: 2,
            shadow:true
        },
        edges: {
            width: 2,
            shadow:true
        }
    };
    network = new vis.Network(container, data, options);
</script>
</div>



