(function(){

	function orderRender(orderObj){
		$('#orderRender').html('');

		localStorage.setItem("newOrderList", JSON.stringify(orderObj));
		total = 0;
		$.each(orderObj, function(i, e){
			$('#orderRender')
			.append($('<tr/>')
				.append($('<td/ class="id" hidden>').text(i).attr('data-text', i))
				.append($('<td/ class="name">').text(e.name).attr('data-text', e.name))
				.append($('<td/ class="nb">').text(e.nb).attr('data-text', e.nb))
				.append($('<td/>').text(e.price).attr('data-text', e.price))
				.append($('<td/>').text(parseInt((e.nb*e.price)*100)/100))
				.append($('<td/>')
					.append('<i/ class="fa fa-plus addRender">'))
				.append($('<td/>')
					.append('<i/ class="fa fa-minus remove">'))
			);
			total += parseInt((e.nb*e.price)*100)/100;
		});

		$('#orderObj').val(JSON.stringify(orderObj));
		$('#total').text(total);

		$(".addRender").on('click', function(){
			addToOrder($(this));
		});

		$(".remove").on('click', function(){
			removeFromOrder($(this));
		});
	}


	function addToOrder(e){
		tr = e.parent().parent();
		id = tr.children("td.id").attr('data-text');
		name = tr.children("td.name").attr('data-text');
		if (!newOrderList[id]) {
			price =  parseInt((tr.children("td.price").attr('data-text'))*100)/100;

			product = {
				'name': name,
				'price': price,
				'nb': 1
			};

			newOrderList[id] = product;

		}else {
			newOrderList[id].nb ++;
		}
		orderRender(newOrderList);
	}

	function removeFromOrder(e){
		tr = e.parent().parent();
		id = tr.children("td.id").attr('data-text');
		name = tr.children("td.name").attr('data-text');
		if (newOrderList[id]) {
			newOrderList[id].nb>1?newOrderList[id].nb -- : delete newOrderList[id]
			;
		}else {
			location.reload();
		}
		orderRender(newOrderList);
	}

	function orderInit(){
		if(!localStorage.getItem("newOrderList") || $('#message').attr('data-statut') == 'orderOk'){
			localStorage.setItem("newOrderList", "{}");
		}

		newOrderList = JSON.parse(localStorage.getItem("newOrderList"));
		orderRender(newOrderList);

		$(".add").on('click', function(){
			addToOrder($(this))
		});

		$("#suppr").on('click', function(){
			localStorage.setItem("newOrderList", "{}");
			newOrderList = {};
			orderRender(newOrderList);
		});

		$('#submit').on('click', function(){
			$('#orderForm').submit();
		})
		orderRender(newOrderList);
	}
	orderInit();

	setTimeout(function(){
		$('#message').hide('slow');
		$('#error').hide('slow');
	}, 5000);
})()