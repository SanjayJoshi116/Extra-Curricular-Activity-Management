<link rel="stylesheet" href="jQuery-Multiple-Select-Plugin/docs/css/bootstrap-4.5.2.min.css" type="text/css">
<link rel="stylesheet" href="jQuery-Multiple-Select-Plugin/docs/css/bootstrap-example.min.css" type="text/css">
<link rel="stylesheet" href="jQuery-Multiple-Select-Plugin/docs/css/prettify.min.css" type="text/css">
<link rel="stylesheet" href="jQuery-Multiple-Select-Plugin/docs/css/fontawesome-5.15.1-web/all.css" type="text/css">

<script type="text/javascript" src="jQuery-Multiple-Select-Plugin/docs/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="jQuery-Multiple-Select-Plugin/docs/js/bootstrap.bundle-4.5.2.min.js"></script>
<script type="text/javascript" src="jQuery-Multiple-Select-Plugin/docs/js/prettify.min.js"></script>

<link rel="stylesheet" href="jQuery-Multiple-Select-Plugin/dist/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="jQuery-Multiple-Select-Plugin/dist/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		window.prettyPrint() && prettyPrint();
	});
</script>

<style>
	.nav-link.active {
		font-weight: bold;
	}

	.badge {
		font-size: 85%;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example-getting-started').multiselect({
			enableHTML: true
		});
	});
</script>
<select id="example-getting-started" multiple="multiple">
	<option value="cheese">Cheese</option>
	<option value="tomatoes">Tomatoes</option>
	<option value="Mozzarella">Mozzarella</option>
	<option value="Mushrooms">Mushrooms</option>
	<option value="Pepperoni">Pepperoni</option>
	<option value="Onions">Onions</option>
</select>