<footer class="bg-dark text-light text-center py-4" style="width: 100%;">
    <div class="container">
        <p>
            Ministère de l'Enseignement Supérieur, de la Recherche et de l'Innovation <span class="text-primary">(MESRI)</span><br />
            Université Cheikh Anta Diop de Dakar <span class="text-primary">(UCAD)</span><br />
            Transmission des Données et Sécurité de l'Information <span class="text-primary">(TDSI)</span>
        </p>
    </div>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    // Fonction pour afficher une confirmation lors de la suppression
    document.getElementById("buttonID")?.addEventListener('click', function () {
        confirm("Voulez-vous vraiment supprimer ?");
    });

    // Fonction pour modifier la couleur de fond de la section
    function modifierRubrique() {
        console.log("Rubrique modifiée");
        document.getElementById("divClass3").style.backgroundColor = "blue";
    }
</script>
</body>
</html>
