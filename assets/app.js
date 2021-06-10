import './portal/assets/css/portal.css';

// import './portal-theme-bs5-v2.0/assets/plugins/fontawesome/js/all.min.js';
// import './portal/assets/plugins/popper.min.js';
// import './portal/assets/plugins/bootstrap/js/bootstrap.js';
import './portal/assets/js/app.js';
import './styles/app.css';
import '../bower_components/dpeges/dpeges'


window.onload = () => {
    // Gestion des boutons "Supprimer"
    // on cible les liens
    let links = document.querySelectorAll("[data-token]")

    // on boucle sur links
    for (const link of links) {
        //on ecoute le clic
        link.addEventListener("click", function(e){
            // on empeche la navigation
            e.preventDefault()

            // on demande confirmation
            if (confirm('voulez-vous supprimer cette image')) {
                // on envoie une requete Ajax vers le href du lien avec la méthode DELETE
                fetch(this.getAttribute("href"), {
                    method: "DELETE",
                    headers: {
                        'X-Requested-With' : "XMLHttpRequest",
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({'_token': this.dataset.token})
                }).then(
                    // on recupere la réponse en JSON
                    response => response.json()
                ).then(data => {
                    if(data.success)
                        this.parentElement.remove()
                    else
                        alert(data.error)
                }).catch(e => alert(e))
            }
        })
    }
        
        
    
        
    
}

// any CSS you import will output into a single css file (app.css in this case)


// start the Stimulus application
// import './bootstrap';
