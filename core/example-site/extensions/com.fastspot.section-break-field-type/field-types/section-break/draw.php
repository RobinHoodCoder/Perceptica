<?
	// There's already a break for callout-esque types
	if ($bigtree["last_resource_type"] != "callouts") {
		echo '<hr />';
	}

	if ($field["title"]) {
		echo '<h3>'.$field["title"].'</h3><br />';
	}
?>