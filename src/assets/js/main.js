
//////////////////////////////////////////////////////////////////
///////////////////////// MENU INDEX /////////////////////////////
//////////////////////////////////////////////////////////////////

if(document.querySelector('body').classList[0] == 'home') {
	const header = document.querySelector('.header');
	const footer = document.querySelector('.footer');
	
	header.style.display = 'none';
	footer.style.display = 'none'
}

//////////////////////////////////////////////////////////////////
///////////////////////// MOBILE MENU /////////////////////////////
//////////////////////////////////////////////////////////////////

const menuBtn = document.querySelector('.header__menu-mobile-icon');
const menuBox = document.querySelector('.header__menu-box');

menuBtn.addEventListener('click', () => {
	menuBtn.classList.toggle('header__menu-mobile-icon--act');
	menuBox.classList.toggle('header__menu-box--act');
})

//////////////////////////////////////////////////////////////////
///////////////////////////// SLIDER /////////////////////////////
//////////////////////////////////////////////////////////////////
if(document.querySelector('body').classList[2] == 'page-id-198') {
	window.addEventListener('load', function(){
		new Glider(document.querySelector('.glider'), {
			slidesToShow: 1,
			scrollLock: true,
			dots: '#dots',
			draggable: true,
			arrows: {
			  prev: '.glider-prev',
			  next: '.glider-next'
			}
		  });
		});
}

//////////////////////////////////////////////////////////////////
//////////////////////////////  ÉPOCAS ////////////////////////////
//////////////////////////////////////////////////////////////////

if(document.querySelector('body').classList[2] == 'post-type-archive-epocas' && window.innerWidth > 900) {

	console.log(window.innerWidth);


	//// HORIZONTAL SCROLL

	gsap.registerPlugin(ScrollTrigger);

	let sections = gsap.utils.toArray(".archiveEpocas__box");

	gsap.to(sections, {
		xPercent: -100,
		ease: "none",
		scrollTrigger: {
		trigger: ".archiveEpocas__box",
		start: 'top 120px',
		pin: true,
		scrub: 1,
		end: () => "+=" + document.querySelector(".archiveEpocas__box").offsetWidth
		}
	});

	//// LINHA DO TEMPO

	const lineBullet = document.querySelectorAll('.archiveEpocas__line-bullet');
	const lineEntry = document.querySelectorAll('.archiveEpocas__line-entry');
	const entryBox = document.querySelectorAll('.archiveEpocas__entry-box');
	const galleryBox = document.querySelectorAll('.archiveEpocas__gallery-box');

	document.addEventListener('scroll', ()=> {
		entryBox.forEach((element, indx) => {
			const entryLeft = element.getBoundingClientRect().left;
			const entryWidth = element.getBoundingClientRect().width;

			if(-entryLeft <= entryWidth && entryLeft < window.innerWidth) {
				lineBullet[indx].classList.add('archiveEpocas__line-bullet--act');
			} else {
				lineBullet[indx].classList.remove('archiveEpocas__line-bullet--act');
			}
		});

		galleryBox.forEach((element, indx) => {
			const galleryLeft = element.getBoundingClientRect().left;
			const galleryRight = element.getBoundingClientRect().right;

			if(galleryLeft <= window.innerWidth && galleryRight >= 0) {
				lineBullet[indx].classList.add('archiveEpocas__line-bullet--act');
			} else {
				lineBullet[indx].classList.remove('archiveEpocas__line-bullet--act');
			}
		});
	});

	lineEntry.forEach((element, index) => {
	  element.addEventListener("click", (e) => {
		e.preventDefault();

		gsap.to(window, {
			scrollTo: {
			  y: entryBox[index].offsetLeft,
			  autoKill: false
			},
			duration: 0.2
		  });

		  lineBullet[indx].classList.add('archiveEpocas__line-bullet--act');
	  });
	  
	});
}

//////////////////////////////////////////////////////////////////
//////////////////////////  HISTÓRIAS ////////////////////////////
//////////////////////////////////////////////////////////////////
if(document.querySelector('body').classList[2] == 'post-type-archive-registros') {
	const registroBtn = document.querySelectorAll('.archiveRegistros__item-menu');
	const cards = document.querySelectorAll('.card');
	const cardCategory = document.querySelectorAll('.card__categoria');

	registroBtn.forEach((element, index) => {	
		element.addEventListener('click', (e) => {

			registroBtn.forEach((elem) => {
				if(elem !== e.target) {
					elem.classList.remove('archiveRegistros__item-menu--act');
				} else {
					elem.classList.toggle('archiveRegistros__item-menu--act');
				}
			});

			cardCategory.forEach((el, ind) => {
				const category = el.getAttribute('href').replace('#', '');
				const selectedCategory = e.target.getAttribute('id');
				
				if(category == selectedCategory && element.classList.contains('archiveRegistros__item-menu--act')) {
					cards[ind].style.display = 'block';
					
				} else if(!element.classList.contains('archiveRegistros__item-menu--act')) {
					cards[ind].style.display = 'block';
				}
				else {
					cards[ind].style.display = 'none';
					
				}
			});
		});
	});
}

//////////////////////////////////////////////////////////////////
////////////////////  SINGLE REGISTROS ////////////////////////////
//////////////////////////////////////////////////////////////////

if(document.querySelector('body').classList[2] == 'single-registros') {

	const zoomBtn = document.querySelector('.singleRegistros__zoom-btn');

	zoomBtn.addEventListener('click', () => {
		const imgBox = document.querySelector('.singleRegistros__img-figure');
		const img = document.querySelector('.singleRegistros__img');

		zoomBtn.classList.toggle('singleRegistros__zoom-btn--act');
		
		if(zoomBtn.textContent == 'ATIVAR ZOOM') {
			zoomBtn.innerHTML = 'DESATIVAR ZOOM';
			img.style.cursor = 'crosshair';
		} else if(zoomBtn.textContent == 'DESATIVAR ZOOM') {
			zoomBtn.innerHTML = 'ATIVAR ZOOM';
			img.style.cursor = 'auto';
		}
	
			imgBox.addEventListener('mousemove', (event) => {
				
				if(zoomBtn.classList.contains('singleRegistros__zoom-btn--act')) {
					let clientX = event.clientX - imgBox.offsetLeft;
					let clientY = event.clientY - imgBox.offsetTop;
		
					let mWidth = imgBox.offsetWidth;
					let mHeight = imgBox.offsetHeight;
		
					clientX = clientX / mWidth * 100;
					clientY = (clientY / mHeight * 100);
		
					img.style.transform = 'translate(-'+clientX+'%, -'+clientY+'%) scale(2)';
				}
			});
	
			imgBox.addEventListener('mouseleave', () => {
				img.style.transform = 'translate(-50%, -50%) scale(1)';
			});
	});
}