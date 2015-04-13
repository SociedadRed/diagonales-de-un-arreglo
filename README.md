# Diagonales de un arreglo
Obtener todas las posibles diagonales de un arreglo dado

### Ejemplo:
```php
$arreglo = array(
	0 => array( 0, 1, 2 ),
	1 => array( 3, 4, 5 ),
	2 => array( 6, 7, 8 )
);
$Matrices = new Matrices( $arreglo );
echo "<pre>".print_r( $Matrices->obtener_diagonales(), TRUE )."</pre>";
```

### Genera:
```php
Array
(
    [0] => 0
    [1] => 1, 3
    [2] => 2, 4, 6
    [3] => 5, 7
    [4] => 8
    [5] => 8
    [6] => 7, 5
    [7] => 6, 4, 2
    [8] => 3, 1
    [9] => 0
    [10] => 2
    [11] => 1, 5
    [12] => 0, 4, 8
    [13] => 3, 7
    [14] => 6
    [15] => 6
    [16] => 7, 3
    [17] => 8, 4, 0
    [18] => 5, 1
    [19] => 2
)
```
