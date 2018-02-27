(function(){

	function orderRender(orderObj){
		$('#orderRender').html('');

		localStorage.setItem("newOrderList", JSON.stringify(orderObj));
		$.each(orderObj, function(i, e){
			$('#orderRender')
			.append($('<tr/>')
				.append($('<td/ class="name">').text(e.name).attr('data-text', e.name))
				.append($('<td/ class="nb">').text(e.nb).attr('data-text', e.nb))
				.append($('<td/>').text(e.price).attr('data-text', e.price))
				.append($('<td/>').text(e.nb*e.price))
				.append($('<td/>')
					.append('<i/ class="fa fa-plus addRender">'))
				.append($('<td/>')
					.append('<i/ class="fa fa-minus remove">'))
			);
		});

		$(".addRender").on('click', function(){
			addToOrder($(this));
		});

		$(".remove").on('click', function(){
			removeFromOrder($(this));
		});
	}

	function addToOrder(e){
		tr = e.parent().parent();
		name = tr.children("td.name").attr('data-text');
		if (!newOrderList[name]) {
			price = tr.children("td.price").attr('data-text');

			product = {
				'name': name,
				'price': price,
				'nb': 1
			};

			newOrderList[name] = product;

		}else {
			newOrderList[name].nb ++;
		}
		orderRender(newOrderList);
	}

	function removeFromOrder(e){
		tr = e.parent().parent();
		name = tr.children("td.name").attr('data-text');
		if (newOrderList[name]) {
			newOrderList[name].nb>1?newOrderList[name].nb -- : delete newOrderList[name]
			;
		}else {
			location.reload();
		}
		orderRender(newOrderList);
	}

	function orderInit(){
		console.log('OrderInitGo')
		if(!localStorage.getItem("newOrderList") || $('#message').attr('data-statut') == 'sended'){
			localStorage.setItem("newOrderList", "{}");
		}

		newOrderList = JSON.parse(localStorage.getItem("newOrderList"));
		orderRender(newOrderList);

		$(".add").on('click', function(){
			addToOrder($(this))
		})

		orderRender(newOrderList);
	}
	orderInit();

	function orderVerif(){
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
		if(!orderVerif()){
			$('#productsForm').submit();
		}
	});

})()