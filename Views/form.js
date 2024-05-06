function validateForm() {
    var nom = document.getElementById('nom').value;
    var description = document.getElementById('description').value;
    var prix = document.getElementById('prix').value;
    var image = document.getElementById('image').value;

    if (nom == "" ||  description == "" || prix == "" ||  image == "") {
        alert("Veuillez remplir tous les champs.");
        return false;
    }
}
