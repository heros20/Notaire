import './portal/assets/css/portal.css';

// import './portal-theme-bs5-v2.0/assets/plugins/fontawesome/js/all.min.js';
// import './portal/assets/plugins/popper.min.js';
// import './portal/assets/plugins/bootstrap/js/bootstrap.js';
import './portal/assets/js/app.js';
import './styles/app.css';


window.onload = () => {
    // Gestion des boutons "Supprimer"
    // on cible les liens
    let links = document.querySelectorAll("[data-token]")
    // on boucle sur links
    for (const link of links) {
        //on ecoute le clic
        link.addEventListener("click", function(e){
            // // on empeche la navigation
            e.preventDefault()

            // on demande confirmation
            if (confirm('voulez-vous supprimer cette image')) {
                // on envoie une requete Ajax vers le href du lien avec la méthode DELETE
                fetch(this.getAttribute("href"), {
                    method: "POST",
                    headers: {
                        'X-Requested-With' : "XMLHttpRequest",
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({'_token': this.dataset.token})
                }).then(
                    // on recupere la réponse en JSON
                    response => response.json()
                ).then(response => {
                    console.log(response);
                    if(response.success)
                        this.parentElement.remove()
                    else
                        alert(response.error)
                }).catch(e => {
                    console.log(e);
                })
            }
        })
    }
        
    $(function() {
        // je stock la recherche d'une url
        var url = window.location.href;

        // je cible tous mes liens
        $("a").each(function() {
            // je verifie que l'url du lien et de la recherche son les mêmes
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
            }
        });
    });        
    
        
    
}

// any CSS you import will output into a single css file (app.css in this case)


// start the Stimulus application
// import './bootstrap';
