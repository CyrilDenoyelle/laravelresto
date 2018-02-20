(function(){

	function formVerif(){

		// console.log($(".form-control"))

		verif = false;
		$(".form-control").each( function(i, e) {
			if (!$(this).val()) {
		    	$('#'+$(this).attr('id')+'-danger').show();
				verif = verif||true;
		    }else {
		    	console.log('ok');
		    	$('#'+$(this).attr('id')+'-danger').css('display: none;');
		    }
		});
		console.log(verif);
	    return verif;
	}

	$('#subm').on('click', function () {
	    if(!formVerif()){
    		$('#productsForm').submit()
	    }

	});
})()