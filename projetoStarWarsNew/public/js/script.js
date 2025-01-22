document.getElementById('searchButton').addEventListener('click', async () => {
    const searchType = document.getElementById('searchType').value;
    const searchInput = document.getElementById('searchInput').value.trim();

    if (!searchInput) {
        document.getElementById('results').innerHTML = '<p class="text-danger">Please enter a search query.</p>';
        return;
    }

    document.getElementById('results').innerHTML = '<p class="text-info">Loading...</p>';

    try {
        const response = await axios.get(`/index.php?action=search&type=${searchType}&query=${encodeURIComponent(searchInput)}`);
        const results = response.data;

        if (results.error) {
            document.getElementById('results').innerHTML = `<p class="text-danger">${results.error}</p>`;
        } else {
            displayResults(results.results);
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        document.getElementById('results').innerHTML = '<p class="text-danger">Error fetching data. Please try again later.</p>';
    }
});

function displayResults(results) {
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = '';

    results.forEach(result => {
        const card = document.createElement('div');
        card.classList.add('card', 'mb-3');
        card.innerHTML = `
            <div class="card-body">
                <h5 class="card-title">${result.name || result.title}</h5>
            </div>
        `;
        resultsDiv.appendChild(card);
    });
}
