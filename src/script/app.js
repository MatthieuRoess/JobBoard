// Evenement qui se déclenche quand le DOM charge
// 
document.addEventListener('DOMContentLoaded', function() {
  let detailsDiv = document.querySelector('.details-container');
  const showMoreButtons = document.querySelectorAll('.show-more');
  // Pour chaque bouton "Voir plus" on ajoute un écouteur d'événement au clic qui va appeler la fonction showDetails
  // Le contenu change en fonction de l'id de l'annonce
  showMoreButtons.forEach(function(button) {
    button.addEventListener('click', async function() {
      const id = button.value;
      try {
        const data = await showDetails(id);
        const detailsHtml = createDetailsHtml(data);
        //cache les autres details si il y en a
        detailsDiv.innerHTML = '';
        detailsDiv.insertAdjacentHTML('beforeend', detailsHtml);
        detailsDiv.classList.remove('hidden');

        //Permet de scroller vers le haut de la page
        detailsDiv.scrollIntoView({ behavior: 'smooth' });

      } catch (error) {
        console.error('Error:', error);
      }
    });
  });
});

function postuler(id) {
  window.location.href = "./?action=postuler&add=" + id;
}


//fonction qui rempli le html avec les données de l'annonce
function createDetailsHtml(dataList) { 
  let html = '';
  dataList.forEach(function(data) {
    html += `
      <div class="details" id="info-panel">
        
          <h2>${data.titre}</h2>

          <div class="details-container">

            <div class="details-content">
              <h3>Description du poste</h3>
              <p>${data.description}</p>
            </div>

            <div class="details-content">
              <h3>Salaire</h3>
              <p>${data.salaire} €</p>
            </div>

            <div class="details-content">
              <h3>Localisation du poste</h3>
              <p>${data.lieu}</p>
            </div>

            <div class="details-content">
              <h3>Temps de travail</h3>
              <p>${data.temps_travail}</p>
            </div>
            
        </div>

        <div class="btn-container">
          <button class="btn-apply" onclick="postuler(${data.id})">Postuler</button>
        </div>


      </div>
    `;
  });
  return html;
}

async function showDetails(id) {
  try {
    const response = await fetch(`http://localhost:3000/ad/${id}`);
    if (!response.ok) {
      throw new Error(`Error getting ad details: ${response.status}`);
    }
    const ad = await response.json();
    return ad;
  } catch (error) {
    throw new Error('Fetch request failed:', error);
  }
}

anime({
  targets: '*',
  translateY: [-50, 0],
  opacity: [0, 1],
  easing: 'easeOutExpo',
  duration: 1000,
});