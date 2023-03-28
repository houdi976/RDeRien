<!DOCTYPE html>
<html>
<head>
	<title>Autocomplétion d'adresses en France</title>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>
<body>
	<label for="adresse">Adresse :</label>
	<input type="text" id="adresse">
	<p>Ville : <span id="ville"></span></p>
	<p>Code INSEE : <span id="code_insee"></span></p>
	<p>Route : <span id="route"></span></p>
	<script>
		$(function() {
			$("#adresse").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "https://api-adresse.data.gouv.fr/search/",
						dataType: "json",
						data: {
							q: request.term
						},
						success: function(data) {
							response($.map(data.features, function(item) {
								return {
									label: item.properties.label,
									value: item.properties.label,
									adresse: item.properties
								}
							}));
						}
					});
				},
				minLength: 3,
				select: function(event, ui) {
					console.log("Adresse sélectionnée : " + ui.item.value);
					var adresse = ui.item.adresse;
					$("#ville").text(adresse.city);
					$("#code_insee").text(adresse.citycode);
					$("#route").text(adresse.street);
				}
			});
		});
	</script>
</body>
</html>
