<?php
	// dnd means dump and die
	function dnd($data) {
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
		die();
	}