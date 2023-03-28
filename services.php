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
	<input type="text" id="code_postal">
	<input type="text" id="ville">
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
									value: item.properties.housenumber+' '+item.properties.street,
									code_postal: item.properties.postcode,
									ville: item.properties.city,
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
					$("#code_postal").val(adresse.postcode);
					$("#ville").val(adresse.city);
				}
			});
		});
	</script>
</body>
</html>
