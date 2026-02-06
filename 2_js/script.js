console.log("je suis dans script.js");

function check_title() {
    // On veut vérifier les champs du formulaire
    const titre = document.querySelector('#titre');
    // .value récupère la valeur d'un input
    console.log("titre : ", titre.value);

    if(titre.value == "") {
        const titre_error = document.querySelector('#titre_error');
        titre_error.classList.remove('titanic');
        return 1;
    } else {
        titre_error.classList.add('titanic');
        return 0;
    }
}

// sélection du form #submitform
const f = document.querySelector('#submitform');

// je crée un écouteur d'événement pour gérer la soumission du form
f.addEventListener("submit", function(event) {
    // on empeche la soumission du formulaire
    // pour éviter le rechargement de page
    event.preventDefault();
    console.log('j\'ai soumis mon formulaire');


    let nb_errors = 0;
    nb_errors += check_title();

    console.log("nb_errors : ", nb_errors);

    if(nb_errors == 0) {
        // Je vais ajouter la ligne dans mon tableau
        const a = document.querySelector('#titre');
        const b = document.querySelector('#annee');
        const c = document.querySelector('#genre');
        console.log(a.value, b.value, c.value);

        // Je veux maintenant ajoute les valeurs dans le tableau
        const t = document.querySelector("#content tbody");

        const row = `
            <tr>
                <td>${a.value}</td>
                <td class="genre">${c.value}</td>
                <td>${b.value}</td>
            </tr>
        `;
        console.log(row);

        // J'ajoute le row à la fin du tableau
        t.insertAdjacentHTML('beforeend', row);

        // Je vide le formulaire
        a.value = "";
        b.value = "";
        c.value = "";

        // J'affiche le "toast"
        const toast = document.querySelector("#success");
        console.log(toast);
        toast.classList.remove('titanic');
        // J'attends 3 secondes, puis je l'enlève : 
        setTimeout(() => {
            toast.classList.add('titanic');
        }, 5000);
    }
});



// On veut gérer les filtres
// je selectionne tous les filtres
const filtres = document.querySelectorAll(".filter-btn");

for (let i= 0; i < filtres.length; i++) {
    filtres[i].addEventListener("click", function(event) {
        event.preventDefault();
        // Texte du bouton
        console.log(filtres[i].innerText);

        const trs = document.querySelectorAll('#content tbody tr');

        // Je veux parcourir mon tableau
        for (let j=0; j < trs.length ; j++) {
            console.log(trs[j]);
            const genre = trs[j].querySelector(".genre");
            // texte de la case dans le tableau
            console.log(genre.innerText);

            // Je veux comparer mon texte du bouton, avec celui de la case du tableau
            // Si le texte est différent, on cache la ligne
            if (filtres[i].innerText.toLowerCase() != genre.innerText.toLowerCase()) {
                // On cache toute la ligne (= le tr)
                trs[j].classList.add('titanic');
            } else {
                trs[j].classList.remove('titanic');
            }

        }

    });

}


