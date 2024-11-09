<footer style="display: fixed; bottom: 0; width: 100%;">
    <!-- Footer 2 -->
    <div class="mt-5 divClass2">
        <div class="container">
            <p class="text-white text-center">
                <span>Ministère de l'Enseignement Supérieur, de la Recherche et de l'Innovation <span class="text-primary">(MESRI)</span></span><br/>
                <span>Université Cheikh Anta Diop de Dakar <span class="text-primary">(UCAD)</span></span><br/>
                <span>Transmission des Données et Sécurité de l'Information <span class="text-primary">(TDSI)</span></span>
            </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Script personnalisé -->
<script>
    // Listener pour le bouton, avec un message de confirmation pour la suppression
    document.getElementById("buttonID").addEventListener('click', function () {
        confirm("Voulez-vous vraiment supprimer ?");
    });

    // Fonction pour changer la couleur de fond de l'élément divClass3
    function modifierRubrique() {
        console.log("Je suis cliqué");
        document.getElementById("divClass3").style.backgroundColor = "blue";
    }
</script>
</body>
</html>
