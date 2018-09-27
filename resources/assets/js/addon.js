$('.template').hide();
$('.custom').hide();
$('.top').hide();

function detect(){
	var design = document.getElementById('dtype').value;
	if(design == 'Template'){
		$('.custom').slideUp(function(){
			$('.template').slideDown();
		});
	};
	if(design == 'Custom'){
		$('.template').slideUp(function(){
			$('.custom').slideDown();
		});
	};

	if(design == 'Default'){
		$('.template').slideUp();
		$('.custom').slideUp();
		document.getElementById('final').value = 'Default';
	};
};

function set(id){
	var custom = id.value;
	document.getElementById('final').value = custom;
};

function topUpForm() {
	$('.top').slideToggle();
};

function detectPrice(){
	var typ = document.getElementById('type').value;
	var val = 0;
	if (typ=='Botol Minum') {
		val = 15000;
	}
	else if (typ=='Kotak Makan') {
		val = 20000;
	}
	else if (typ=='Alat Makan') {
		val = 20000;
	}
	document.getElementById('prc').value = val;
};

function count(){
	var quan = document.getElementById('qty').value;
	var pr = document.getElementById('prc').value;
	var sent = document.getElementById('send').value = 9000;
	var disc = quan*pr/100;
	console.log(disc);


	if (document.getElementById('pay_method').value == 'Tupperware Wallet') {
		console.log(disc);
		var ttl = document.getElementById('price').value = quan*pr-disc;
		console.log(ttl);
	}
	else{
		var ttl = document.getElementById('price').value = quan*pr;
	}
	
	document.getElementById('total').value = ttl + sent;
};

function topUp(clicked_id){
	var amn;
	if (clicked_id == 'price1') {	
		amn = document.getElementById('price1').value;
		console.log(amn);
	}
	else if (clicked_id == 'price2') {	
		amn = document.getElementById('price2').value;
		console.log(amn);
	}
	else if (clicked_id == 'price3') {	
		amn = document.getElementById('price3').value;
		console.log(amn);
	}
	document.getElementById('final').value = amn;
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#custom').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#designs").change(function(){
    readURL(this);
});