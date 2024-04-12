"use strict"

function imagesInit() {
    const images = document.querySelectorAll('.select-img');
    if (images.length) {
        images.forEach(image => {
            const imageItem = image.querySelector('img');
            // const padding = imageItem.offsetHeight / imageItem.offsetWidth * 100;
            // image.style.paddingBottom = `${padding}%`;
            imageItem.classList.add('init');
        });
    }
}

function gridInit() {
    const items = document.querySelector('.items-container');
    const itemsGrid = new Isotope(items, {
        itemSelector: '.item',
        masonry: {
            fitWidth: true,
            gutter: 30,
        }
    });


    document.addEventListener('click', documentActions);

    function documentActions(e) {
        const targetElement = e.target;
        if (targetElement.closest('.filter-select')) {
            const filterItem = targetElement.closest('.filter-select');
            const filterValue = filterItem.dataset.filter;
            const filterActiveItem = document.querySelector('.filter-select.active-filter');

            filterValue === '*' ? itemsGrid.arrange({filter: `` }) :
                itemsGrid.arrange({filter:`[data-filter="${filterValue}"]`})
            filterActiveItem.classList.remove('active-filter');
            filterItem.classList.add('active-filter');

            e.preventDefault();
        }
    }
}

window.addEventListener('load', windowLoad);

function windowLoad(){
    imagesInit();
    gridInit();
}