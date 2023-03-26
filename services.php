<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recherche d'adresse</title>
</head>
<body>
    <form action="" method="get">
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" onkeyup="rechercherAdresses()">
        <select id="listeAdresses" style="display: none;"></select>
    </form>

    <script>
        function rechercherAdresses() {
            var saisie = document.getElementById('adresse').value;

            if (saisie.length >= 3) { // Ne lance la recherche que si la saisie fait au moins 3 caractères
                var url = 'https://api.laposte.fr/controladresse/v1/adresses?q=' + encodeURIComponent(saisie) + '&typeVoie=T&nombre=10';

                var headers = {
                    'X-Okapi-Key': 'VotreClefAPI', // Remplacer "VotreClefAPI" par votre clé API de La Poste
                    'Accept': 'application/json'
                };

                fetch(url, {headers: headers})
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(adresses) {
                        var listeAdresses = document.getElementById('listeAdresses');
                        listeAdresses.style.display = adresses.length > 0 ? 'block' : 'none'; // Affiche ou masque la liste déroulante selon s'il y a des adresses à afficher ou non

                        while (listeAdresses.firstChild) { // Efface les anciens éléments de la liste déroulante
                            listeAdresses.removeChild(listeAdresses.firstChild);
                        }

                        adresses.forEach(function(adresse) { // Ajoute chaque adresse dans la liste déroulante
                            var option = document.createElement('option');
                            option.value = adresse.libelleAdresse;
                            option.text = adresse.libelleAdresse;
                            listeAdresses.appendChild(option);
                        });
                    });
            } else { // Si la saisie est trop courte, on masque la liste déroulante
                document.getElementById('listeAdresses').style.display = 'none';
            }
        }
    </script>
</body>
</html>
