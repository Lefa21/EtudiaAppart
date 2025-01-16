document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const suggestions = document.getElementById('suggestions');
    const filtersContainer = document.getElementById('filters-container');

    searchInput.addEventListener('keyup', () => {
        const keyword = searchInput.value.trim();
        if (keyword.length > 2) {
            fetch(`index.php?module=ad_search&action=search_titles&keyword=${encodeURIComponent(keyword)}`)
                .then(response => response.json())
                .then(data => {
                    suggestions.innerHTML = ''; 
                    if (data.length > 0) {
                        data.forEach(item => {
                            const li = document.createElement('li');
                            li.textContent = item.ad_title;
                            li.addEventListener('click', () => {
                                searchInput.value = item.ad_title; 
                                suggestions.innerHTML = ''; 
                                filtersContainer.style.marginTop = "1rem"; 
                            });
                            suggestions.appendChild(li);
                        });
                        filtersContainer.style.marginTop = "6rem";
                    } else {
                        filtersContainer.style.marginTop = "1rem";
                    }
                })
                .catch(error => console.error('Erreur lors de la recherche :', error));
        } else {
            suggestions.innerHTML = ''; 
            filtersContainer.style.marginTop = "1rem"; 
        }
    });
});
