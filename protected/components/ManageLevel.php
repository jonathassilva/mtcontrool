<?php

class ManageLevel {
	const ADMIN = 1;
	const COMUM = 0;
	private $niveisUsuario;
	
	public static function getLevel($nivelUsuario) {
		$niveisUsuario ['ADMIN'] = 1;
		$niveisUsuario ['COMUM'] = 0;
		return isset ( $niveisUsuario [$nivelUsuario] ) ? $niveisUsuario [$nivelUsuario] : null;
	}
}

?>