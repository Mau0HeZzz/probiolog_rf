<!-- <div class="container-mini" id="inst">
	
</div>
<script>
	 document.addEventListener("DOMContentLoaded", function(event) {
		let instContainer = document.getElementById('inst');		
		let url = '/ajax/facebook.php';		
		fetch(url)
		.then(response => response.text() ) 
		.then(data => {		
			//console.log(data);
			let inst = data;
			if(inst != 0){
				instContainer.innerHTML = inst;				
				$('.section_box2_foto_slider').slick({
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: true,
					arrows: false,
					dotsClass: 'section_box2_scrol',
					responsive: [
						{
						  breakpoint: 992,
						  settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						  }
						},
						{
						  breakpoint: 768,
						  settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						  }
						}
					]
				});
			}
		})
		.catch(function(error) {
			console.log(error);
		});
});	
</script> -->