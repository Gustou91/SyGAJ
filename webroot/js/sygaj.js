$(document).ready(function(){

	  console.log('Go');

	  $('.box-body').on('click', '.listItems', function(event){
	    console.log('target', event.target);
	    console.log('curentTarget', event.currentTarget)
	    

	  });

	  $('.listItems').change(function(event){
	    var value = $(this).val();
	    console.log('Event Change detected.');
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
                    })
                }
            })
	  });

	  $(".listItems").click(function(){
	    console.log('Event click detected.');
	  });

});