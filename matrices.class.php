<?php
class Matrices {
	
	public $resultado 	= array();
	public $filas 		= 0;
	public $arreglo	= array();
	
	function __construct( $arreglo = array() ) {
		$this->filas 	= count($arreglo);
		$this->arreglo	= $this->revisar_arreglo( $arreglo );
	}
	
	function revisar_arreglo( $arreglo = array() ) {
		foreach( $arreglo as $key => $fila ) {
			$columnas = count($fila);
			if( $columnas != $this->filas ){
				echo "<p>El n&uacute;mero de filas no coincide con el n&uacute;mero de columnas</p>";
				return array();
			}
		}
		
		return $arreglo;
	}
	
	function obtener_diagonales() {
		$this->esquina_superior_izquierda();
		$this->esquina_inferior_derecha();
		
		$this->esquina_superior_derecha();
		$this->esquina_inferior_izquierda();
		
		return $this->resultado;
	}

	function esquina_superior_izquierda() {
		if ( !empty( $this->arreglo ) ) {
			// Inicializamos variables
			$r 			= 0;
			$k 			= 0;
			$y 			= 0;
			$x 			= 0;
			
			// Diagonales de la primera mitad del arreglo
			for ($f1 = 0; $f1 < $this->filas; $f1++) {
				$valores 	= array();
				$valores[] 	= $this->arreglo[$r][$f1];
				if($f1 > 0){
					$k 		= $f1;
					for($i = $k; $i > 0; $i--) {
						$x 	= $i - 1;
						$y 	= $k - $i + 1;
						$valores[] = $this->arreglo[$y][$x];
					}                       
				}
				$this->resultado[] = implode(", ", $valores);   
			}
			
			// Diagonales de la segunda mitad del arreglo
			$r 		= $r + 1;
			$f2 	= $f1;   
			for($i = $r; $i < $this->filas; $i++) {
				$valores 	= array();      
				$y 			= $i;
				$x 			= $f1 - 1;
				$valores[] = $this->arreglo[$y][$x];
				for($j = ($x - $y); $j > 0; $j--) {
					$y 		= $f1 - $j;
					$x 		= $f2 - $y;
					$valores[] = $this->arreglo[$y][$x];
				}
				$this->resultado[] = implode(", ", $valores);
				$f2++;
			}
		}
	}
	
	function esquina_inferior_derecha() {
		if ( !empty( $this->arreglo ) ) {
			// Inicializamos variables
			$interno = array();
			$f1 = $this->filas - 1;
			
			for($i = $f1; $i > -1; $i--) {
				$valores 	= array();    
				$y 			= $i;
				$x			= $f1;
				if ( $y != $x ) {
					if ( !isset( $col ) ) {
						$col = $f1 - 1;
						for($j = $f1; $j > -1; $j--) {
							if ( isset( $this->arreglo[$j][$col] ) ) {
								$valores[] = $this->arreglo[$j][$col];
							}
							$col++;
						}
					} else {
						$col = $i;
						for($j = $f1; $j > -1; $j--) {
							if ( isset( $this->arreglo[$j][$col] ) ) {
								$valores[] = $this->arreglo[$j][$col];
							}
							$col++;
						}
					}
				} else {
					$valores[] = $this->arreglo[$y][$x];
				}
				$interno[] = implode(", ", $valores);	
			}
			
			for( $i = $f1 - 1; $i > -1; $i-- ) {
				$valores 	= array();
				$y 			= $i;
				for( $j = 0; $j < $f1; $j++ ) {
					if ( isset( $this->arreglo[$y][$j] ) ) {
						$valores[] = $this->arreglo[$y][$j];
					}
					$y--;
				}
				$interno[] = implode(", ", $valores);
			}
			
			$this->resultado = array_merge( $this->resultado, $interno );
		}
	}
	
	function esquina_superior_derecha() {
		if ( !empty( $this->arreglo ) ) {
			// Inicializamos variables
			$less = 0 - $this->filas;
			$plus = 0 + ( $this->filas - 1 );
			
			for ( $diagonal = $plus; $diagonal > $less; $diagonal-- ) {
				$valores = array_map( function($i) use ($diagonal) {
					return $diagonal < 0 ? array_slice($i, 0, $diagonal) : array_slice($i, $diagonal);  
				}, $diagonal > 0 ? array_slice($this->arreglo, 0, -$diagonal) : array_slice($this->arreglo, abs($diagonal)));

				array_walk( $valores, function( &$item, $key ) {
					if ( isset( $item[$key] ) ) {
						$item = $item[$key];
					} else {
						$item = NULL;
					}
				});
				
				$this->resultado[] = implode(", ", $valores);
			}
		}
	}
	
	function esquina_inferior_izquierda() {
		if ( !empty( $this->arreglo ) ) {
			// Inicializamos variables
			$f1 = $this->filas - 1;
			
			for( $i = 0; $i < $this->filas; $i++ ) {
				$valores 	= array();
				$y 			= $i;
				$j			= $f1 - 1;
				$valores[]	= $this->arreglo[$f1][$y];
				for ( $y = $i - 1; $y > -1; $y-- ) {
					if ( isset( $this->arreglo[$j][$y] ) ) {
						$valores[]	= $this->arreglo[$j][$y];
						$j--;
					}
				}
				$this->resultado[] = implode(", ", $valores);
			}
			
			for( $y = $f1 - 1; $y > -1; $y--  ) {
				$valores 	= array();
				$j = $f1;
				for( $x = $y; $x > -1; $x-- ) {
					$valores[]	= $this->arreglo[$x][$j];
					$j--;
				}
				$this->resultado[] = implode(", ", $valores);
			}
		}
	}
}