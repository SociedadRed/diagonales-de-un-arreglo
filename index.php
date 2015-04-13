<?php
define( '__ROOT',	dirname(__FILE__));
define( 'DS',		DIRECTORY_SEPARATOR);

include( __ROOT . DS . 'matrices.class.php' );

$arreglo = array(
	0 => array( 0, 1, 2 ),
	1 => array( 3, 4, 5 ),
	2 => array( 6, 7, 8 )
);
$Matrices = new Matrices( $arreglo );
echo "<pre>".print_r( $Matrices->obtener_diagonales(), TRUE )."</pre>";

$arreglo = array(
	0 => array( 0, 	1, 	2 ),
	1 => array( 3, 	4, 	5 ),
	2 => array( 6, 	7, 	8 ),
	3 => array( 9, 	10, 11 )
);
$Matrices = new Matrices( $arreglo );
echo "<pre>".print_r( $Matrices->obtener_diagonales(), TRUE )."</pre>";

$arreglo = array(
	0 => array( 0, 	1, 	2, 3 ),
	1 => array( 4, 	5, 	6, 4 ),
	2 => array( 8, 	9, 	10, 5 ),
	3 => array( 12, 13, 14, 6 )
);
$Matrices = new Matrices( $arreglo );
echo "<pre>".print_r( $Matrices->obtener_diagonales(), TRUE )."</pre>";
