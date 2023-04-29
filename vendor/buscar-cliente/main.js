const searchInput = document.getElementById('search-input');
const searchResults = document.getElementById('search-results');

const countries = [
  'Afghanistan',
  'Albania',
  'Algeria',
  'Andorra',
  'Angola',
  // ...etc.
];

function displayMatches() {
  const searchValue = this.value;
  const matches = countries.filter(country => country.toLowerCase().startsWith(searchValue.toLowerCase()));

  const html = matches.map(match => `
    <li>${match}</li>
  `).join('');

  searchResults.innerHTML = html;
}

searchInput.addEventListener('input', displayMatches);
