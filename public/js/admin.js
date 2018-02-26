(function(){

	// console.log($('#message').attr('data-statut'), $('#message').attr('data-statut') == 'added');
	function formInit(){
		if(!localStorage.getItem("newproductform") || $('#message').attr('data-statut') == 'added'){
			localStorage.setItem("newproductform", "{}");
		}

		newproductform = JSON.parse(localStorage.getItem("newproductform"));
		
		if ($('#message').attr('data-statut') == 'edit') {
			$(".form-control").each(function(){
				newproductform[$(this).attr('id')] = $(this).val();
				localStorage.setItem("newproductform", JSON.stringify(newproductform));
			});
		}
		
		$(".form-control").each( function(i, e) {
			if(!$(this).val()){
				$(this).val(newproductform[$(this).attr('id')]);
			}
		})

		$(".form-control").on('keyup', function(){
			newproductform[$(this).attr('id')] = $(this).val();
			localStorage.setItem("newproductform", JSON.stringify(newproductform));
		});
	}
	formInit();

	function formVerif(){
		verif = false;
		$(".form-control").each( function(i, e) {
			if (!$(this).val()) {
				$('#'+$(this).attr('id')+'-danger').show();
				verif = verif||true;
			}else {
				$('#'+$(this).attr('id')+'-danger').css('display: none;');
			}
		});
		return verif;
	}

	$('#subm').on('click', function () {
		if(!formVerif()){
			$('#productsForm').submit();
		}
	});

	function editionBtn(){
		$('.edit').each(function(){
			token =$(this).next().val();
			href = $(this).attr("href");
			$(this).attr("href", href + '/' + token);
		});
	}
	// editionBtn();

	function destroyValid(){
		$(".trash").on('click', function(i, e) {
			$('.actionBtn-'+$(this).attr('data-id')).toggle();
		});

	}destroyValid();

	setTimeout(function(){
		$('#message').hide('slow');
	}, 5000);
})()