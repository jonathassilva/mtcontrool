<?php
/*
class ManageLevel {
	const ADMIN = 1;
	const TESTER = 0;
	private $niveisUsuario;
	
	public static function getLevel($nivelUsuario) {
		$niveisUsuario ['ADMIN'] = 1;
		$niveisUsuario ['TESTER'] = 0;
		return isset ( $niveisUsuario [$nivelUsuario] ) ? $niveisUsuario [$nivelUsuario] : null;
	}
}
*/


class ManageLevel{
      const TESTER = 0;
      const ADMIN  = 1;
      
    // For CGridView, CListView Purposes
      public static function getLabel( $level ){
          if($level == self::TESTER)
             return 'Tester';
          if($level == self::ADMIN)
             return 'Admin';
          
          return false;
      }
      // for dropdown lists purposes
      public static function getLevelList(){
          return array(
                 self::TESTER=>'Tester',
                 self::ADMIN=>'Admin');
    }
    
}
?>