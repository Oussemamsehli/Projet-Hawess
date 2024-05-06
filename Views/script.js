// Fonction pour trier les produits par prix
function trierProduitsParPrix(minPrix, maxPrix) {
    // Sélectionne tous les éléments de produit sur la page
    var produits = document.querySelectorAll('.produit');

    // Parcours chaque produit
    produits.forEach(function(produit) {
        // Récupère le prix du produit
        var prixProduit = parseFloat(produit.querySelector('.prix').textContent);

        // Vérifie si le prix du produit est dans la plage spécifiée
        if (prixProduit >= minPrix && prixProduit <= maxPrix) {
            // Affiche le produit
            produit.style.display = 'block';
        } else {
            // Cache le produit s'il ne correspond pas à la plage de prix
            produit.style.display = 'none';
        }
    });
}

// Écouteurs d'événements pour les boutons de tri par prix
document.getElementById('btn0_20').addEventListener('click', function() {
    trierProduitsParPrix(0, 20);
});

document.getElementById('btn20_50').addEventListener('click', function() {
    trierProduitsParPrix(20, 50);
});

document.getElementById('btn50_100').addEventListener('click', function() {
    trierProduitsParPrix(50, 100);
});
