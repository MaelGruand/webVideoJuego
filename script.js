document.getElementById('gameForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const gameName = document.getElementById('gameName').value;
    const gameImage = document.getElementById('gameImage').value;
    const gameLink = document.getElementById('gameLink').value;
    const releaseYear = document.getElementById('releaseYear').value;

    const tableBody = document.getElementById('tableBody');
    const newRow = tableBody.insertRow();

    newRow.innerHTML = `
        <td><img src="${gameImage}" alt="${gameName}" class="game-image"></td>
        <td>${gameName}</td>
        <td><a href="${gameLink}" target="_blank">${gameLink}</a></td>
        <td>${releaseYear}</td>
    `;

    // Réinitialiser le formulaire
    document.getElementById('gameForm').reset();
});
document.getElementById('gameForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío normal del formulario

    const gameData = {
        gameName: document.getElementById('gameName').value,
        gameImage: document.getElementById('gameImage').value,
        gameLink: document.getElementById('gameLink').value,
        releaseYear: document.getElementById('releaseYear').value
    };

    fetch('https://script.google.com/macros/s/AKfycbwuQjtAWvGF-CuLCOJrYjzcc9cIbZALx4V8Bp2h6Gqji0cp-t_pftSDN0OqLPVJWlR99A/exec', {
        method: 'POST',
        body: JSON.stringify(gameData),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.result === "success") {
            alert('Juego añadido con éxito.');
        } else {
            alert('Error al añadir el juego.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});