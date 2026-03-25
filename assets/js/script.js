// AJAX Live Search Functionality
function liveSearch() {
    const searchInput = document.getElementById('search-input');
    const resultsContainer = document.getElementById('results');

    searchInput.addEventListener('keyup', () => {
        const query = searchInput.value;
        if (query.length > 2) { // Start searching after 3 characters
            fetch(`api/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.textContent = item.name; // Assuming item has a 'name' property
                            resultsContainer.appendChild(div);
                        });
                    } else {
                        resultsContainer.innerHTML = '<p>No results found.</p>';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            resultsContainer.innerHTML = '';
        }
    });
}

// Call the liveSearch function on page load
window.onload = liveSearch;