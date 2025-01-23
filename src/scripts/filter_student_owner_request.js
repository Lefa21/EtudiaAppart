document.addEventListener("DOMContentLoaded", () => {
    const filterButtons = document.querySelectorAll('.filter-button-request');
    const filterMenus = document.querySelectorAll('.filter-menu');
    const rows = document.querySelectorAll('.table-row');
    const filters = {};

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';


            filterButtons.forEach(b => {
                b.setAttribute('aria-expanded', 'false');
            });


            button.setAttribute('aria-expanded', !isExpanded);
        });
    });

    document.addEventListener('click', (event) => {
        if (!event.target.closest('.filters')) {
            filterButtons.forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });

 
    filterMenus.forEach(menu => {
        menu.addEventListener('click', (event) => {
            if (event.target.tagName === 'LI') {
                const filterType = menu.getAttribute('data-filter');
                const filterValue = event.target.getAttribute('data-value');

                if (filters[filterType] === filterValue) {
                    delete filters[filterType];
                } else {
                    filters[filterType] = filterValue;
                }

                
                applyFilters();
            }
        });
    });

   
    function applyFilters() {
        rows.forEach(row => {
            let isVisible = true;

           
            for (const [filterType, filterValue] of Object.entries(filters)) {
                if (row.getAttribute(`data-${filterType}`) !== filterValue) {
                    isVisible = false;
                    break;
                }
            }

       
            row.style.display = isVisible ? "" : "none";
        });
    }
});
