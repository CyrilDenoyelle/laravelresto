(function(){


	function formVerif(){

		verif = false;
		if (!$("#productName").val()) {
	    	$('#productName-danger').show();
			verif = verif||true;
	    }else {
	    	$('#productName-danger').css('display: none;');
	    }

	    if (!$("#priceunit").val()) {
	    	$('#priceunit-danger').show();
			verif = verif||true;
	    }else {
	    	$('#priceunit-danger').css('display: none;');
	    }

	    if (!$("#detailDescription").val()) {	
	    	$('#detailDescription-danger').show();
			verif = verif||true;
	    }else {
	    	$('#detailDescription-danger').css('display: none;');
	    }

	    return verif;
	}

	$('#subm').on('click', function () {
	    console.log(formVerif());
	    if(!formVerif()){
    		$('#productsForm').submit()
	    }

	});
})()