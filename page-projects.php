<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>


<h1 class="projects_h1">PROJECTS</h1>
	<template>
<h2 class="h2"></h2>
<p class="text"></p>

<article class="galleryWrapper">
		
		<img class="billede" src="" alt="">
		<img class="billede2" src="" alt=""> 
		<img class="billede3" src="" alt="">
		<img class="billede4" src="" alt="">
		<img class="billede5" src="" alt="">
		<img class="billede6" src="" alt="">

</article>
</template>



 <div id="popup">
      <article class="popup">
        <img src="" alt=""></img>
      </article>
    </div>



<main id="site-content">
<nav id="filtermenu"></nav>

	<section class="eventcontainer">
    </section>
	<script>
  

		let events;
		let filterEvent;

		const url = "https://dnygaard.dk/kea/tonelise/wordpress/wp-json/wp/v2/event?per_page=100";
	
		

		async function getJson() {	
			const response = await fetch(url);
			events = await response.json()
			console.log("Event", events);
			opretknapper();
			// Simuler at den klikke på den første knap
			document.querySelector(".filter").click();
		}

			// Opret knapper
			function opretknapper () {
			events.forEach(event => {
				document.querySelector("#filtermenu").innerHTML += `<button class="filter" data-event="${event.id}">${event.title.rendered}</button>`
				
			})

			addEventListenersToButtons();
		
		}
		// click funktion på knapper 
		function addEventListenersToButtons() {
			document.querySelectorAll("#filtermenu button").forEach(elm =>{
				elm.addEventListener("click", filtrering);
			})
		};


		function filtrering(){
			filterEvent = this.dataset.event;
			document.querySelectorAll("#filtermenu button").forEach(elm =>{
				elm.classList.remove("valgt");
			})
        this.classList.add("valgt");
			console.log(filterEvent);
			visEvent();
		}

	


		function visEvent() {
			let temp = document.querySelector("template");
			let container = document.querySelector(".eventcontainer")
			container.innerHTML = "";
			events.forEach(event => {
				if ( filterEvent == event.id){
				let klon = temp.cloneNode(true).content;

				
				
					
				klon.querySelector(".h2").innerHTML = event.h2;
				klon.querySelector(".text").innerHTML = event.text;
				klon.querySelector(".billede").src = event.billede.guid;
				klon.querySelector(".billede").addEventListener("click", () => visPopup(event.billede.guid));
				klon.querySelector(".billede2").src = event.billede2.guid;
				klon.querySelector(".billede2").addEventListener("click", () => visPopup(event.billede2.guid));
				klon.querySelector(".billede3").src = event.billede3.guid;
				klon.querySelector(".billede3").addEventListener("click", () => visPopup(event.billede3.guid));
				klon.querySelector(".billede4").src = event.billede4.guid;
				klon.querySelector(".billede4").addEventListener("click", () => visPopup(event.billede4.guid));
				klon.querySelector(".billede5").src = event.billede5.guid;
				klon.querySelector(".billede5").addEventListener("click", () => visPopup(event.billede5.guid));
				klon.querySelector(".billede6").src = event.billede6.guid;
				klon.querySelector(".billede6").addEventListener("click", () => visPopup(event.billede6.guid));
				
				container.appendChild(klon);
				}
			});
		}



	function visPopup(src) {
	console.log(src);
	const popup = document.querySelector("#popup");
	document.querySelector("#popup").style.display="flex";
	document.querySelector("#popup img").src = src;
	document.querySelector("#popup").addEventListener("click", () => (popup.style.display = "none"));
	}



	

	getJson();
</script>

	</script>


			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer();
 ?>
