$(document).ready(function(){

	console.log('Go');

	$('#fullName').keyup(function(){

		var recherche = $(this).val();
		var monUrl = "/SyGAJ/inscriptions/find";

		console.log('Event Change keyup for fullName.');
		console.log('Value = ', recherche);
		console.log('url = ', monUrl);

		if(recherche.length > 3) {
			$.ajax({
				type: 'post',
				url: monUrl,
				data: {
	            	fullName: recherche
	        	},
				dataType: 'json',
				success: function (response) {
					$.each(response, function(index, object){
		                console.log("Index= ".index);
		                console.log(object);
		                $('#mail').val(object.mem_mail);
		                $('#adr1').val(object.mem_adr1);
		                $('#adr2').val(object.mem_adr2);
		                $('#listVilles').val(object.mem_idville);
		                $('#listCeintures').val(object.mem_ceinture);

					})
				}
			})
		}
	})




	$('#listCategories').change(function(event){
		var value = $(this).val();
		console.log('Event Change detected for listCategories.');
		console.log('Value = ', value);
		var monUrl = "/SyGAJ/poules/index?categorie="+value;
		console.log('url = ', monUrl);

		window.location = monUrl; 

	});


	$('#listMembers').change(function(event){
		var value = $(this).val();
		console.log('Event Change detected for listMembers.');
		console.log('Value = ', value);
		var monUrl = "/SyGAJ/inscriptions/find";
		console.log('url = ', monUrl);

		$.ajax({
			url: monUrl,
	        data: {
	            id: value
	        },
	        dataType: 'json',
	        type: 'post',
	        success: function (response) {
	            $.each(response, function(index, object){
	                console.log("Index= ".index);
	                console.log(object);
	                $('#mail').val(object.mem_mail);
	                $('#adr1').val(object.mem_adr1);
	                $('#adr2').val(object.mem_adr2);
	                $('#listVilles').val(object.mem_idville);
	                $('#listCeintures').val(object.mem_ceinture);
	                $('#idMembre').val(value);

	            })
	        }
	    })
	});




	$('#listArticles').change(function(event){
	var value = $(this).val();
	console.log('Event Change detected for listArticles.');
	console.log('Value = ', value);
	var monUrl = "/SyGAJ/inscriptions/addArticle";
	console.log('url = ', monUrl);

	$.ajax({
		url: monUrl,
	        data: {
	            id: value
	        },
	        dataType: 'json',
	        type: 'post',
	        success: function (response) {
	            $.each(response, function(index, object){
	                console.log("Index= ".index);
	                console.log(object);
	                $('#mail').val(object.mem_mail);
	                $('#adr1').val(object.mem_adr1);
	                $('#adr2').val(object.mem_adr2);
	                $('#listVilles').val(object.mem_idville);
	                $('#listCeintures').val(object.mem_ceinture);
	            })
	        }
	    })
	});

});