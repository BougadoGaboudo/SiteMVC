// Sélection de toutes les images dans les divs avec la classe "slide"
const images = document.querySelectorAll('.slide img');

// Parcours de chaque image pour ajouter un gestionnaire d'événements au clic
images.forEach(image => {
    image.addEventListener('click', function() {
        // Récupération de l'URL de l'image cliquée
        const newImageUrl = this.getAttribute('src');

        // Sélection de l'élément avec la classe "cadre"
        const cadre = document.querySelector('.cadre img');

        // Changement de l'attribut "src" de l'image dans la div "cadre"
        cadre.setAttribute('src', newImageUrl);
    });
});

 const cadre = document.querySelector('.cadre');

    // Sélectionnez tous les éléments avec la classe "slide"
    const slides = document.querySelectorAll('.slide');

    // Ajoutez un gestionnaire d'événements pour le clic sur chaque image dans chaque div ".slide"
    slides.forEach(function(slide) {
        // Sélectionnez toutes les images dans la div ".slide"
        const images = slide.querySelectorAll('img');

        // Ajoutez un gestionnaire d'événements pour le clic sur chaque image
        images.forEach(function(image) {
            image.addEventListener('click', function() {
                // Dans la fonction de gestionnaire d'événements, ajoutez la classe "opaque" à l'élément "cadre"
                cadre.classList.add('opaque');
            });
        });
    });

// Flex panel
const allBlocs = document.querySelectorAll('.bloc');

allBlocs.forEach(bloc => {
    bloc.addEventListener('click', (e) => {
        console.log(e.target);
        e.target.classList.add('active');

        for(let i = 0; i < allBlocs.length; i++){
            if(allBlocs[i] !== e.target){
                allBlocs[i].classList.remove('active');
            }
        }

    });
    bloc.addEventListener('focus', (e) => {
        e.target.classList.add('active');

        for(let i = 0; i < allBlocs.length; i++){
            if(allBlocs[i] !== e.target){
                allBlocs[i].classList.remove('active');
            }
        }
    });
})


const buttons = document.querySelectorAll('button');

buttons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.stopPropagation();
    })
})