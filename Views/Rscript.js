document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("categorieForm");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire par défaut
        
        // Valider les champs
        if (validateForm()) {
            // Si le formulaire est valide, envoyer les données
            this.submit();
        }
    });
});

function validateForm() {
    let isValid = true;

    
   

    // Valider le nom de la categorie
    const nomcategorie = document.getElementById("nomcategorie").value;
    if (nomcategorie) {
        isValid = false;
        alert("Veuillez sélectionner une categorie.");
        return isValid;
    }

   

    return isValid;
}
