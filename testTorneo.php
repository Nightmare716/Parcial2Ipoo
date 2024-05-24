<?php

include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("Fotbool.php");
include_once("Basket.php");

// Crear objetos de categoría
$catMayores = new Categoria(1, 'Mayores');
$catJuveniles = new Categoria(2, 'Juveniles');
$catMenores = new Categoria(3, 'Menores');

// Crear objetos de equipos
$objE1 = new Equipo("Equipo Uno", "Cap.Uno", 11, $catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos", 11, $catMayores);
$objE3 = new Equipo("Equipo Tres", "Cap.Tres", 11, $catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro", 11, $catJuveniles);
$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco", 11, $catMenores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis", 11, $catMenores);
$objE7 = new Equipo("Equipo Siete", "Cap.Siete", 11, $catMayores);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho", 11, $catMayores);
$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve", 11, $catJuveniles);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez", 11, $catJuveniles);
$objE11 = new Equipo("Equipo Once", "Cap.Once", 11, $catMenores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce", 11, $catMenores);

// Crear objeto de Torneo con importe base del premio de 100,000
$torneo = new Torneo(100000);

// Crear 3 partidos de baloncesto
$partidoBasquet1 = $torneo->ingresarPartido($objE7, $objE8, '2024-05-05', 'basket', 80, 120, 7, $torneo);
$partidoBasquet2 = $torneo->ingresarPartido($objE9, $objE10, '2024-05-06', 'basket', 81, 110, 8, $torneo);
$partidoBasquet3 = $torneo->ingresarPartido($objE11, $objE12, '2024-05-07', 'basket', 115, 85, 9, $torneo);

// Crear 3 partidos de fútbol
$partidoFutbol1 = $torneo->ingresarPartido($objE1, $objE2, '2024-05-07', 'futbol', 3, 2, 0);
$partidoFutbol2 = $torneo->ingresarPartido($objE3, $objE4, '2024-05-08', 'futbol', 0, 1, 0);
$partidoFutbol3 = $torneo->ingresarPartido($objE5, $objE6, '2024-05-09', 'futbol', 2, 3, 0);



// Agregar partido extra de fútbol
$partidoExtra = $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'futbol', 0, 0, 0, $torneo);

echo "Respuesta al agregar partido extra de fútbol:\n";
echo $partidoExtra . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n\n";

// Agregar partido inválido de baloncesto
$partidoInvalido = $torneo->ingresarPartido($objE11, $objE12, '2024-05-23', 'basket', 0, 0, 0, $torneo);

echo "Respuesta al agregar partido inválido de baloncesto:\n";
echo $partidoInvalido . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n\n";

// Agregar otro partido de baloncesto
$partidoBasquet4 = $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basket', 0, 0, 0, $torneo);

echo "Respuesta al agregar otro partido de baloncesto:\n";
echo $partidoBasquet4 . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n\n";

// Dar ganadores de partidos de baloncesto
echo "Ganadores de partidos de baloncesto:\n";
echo implode(", ", $torneo->darGanadores('basket')) . "\n\n";

// Dar ganadores de partidos de fútbol
echo "Ganadores de partidos de fútbol:\n";
echo implode(", ", $torneo->darGanadores('futbol')) . "\n\n";

// Calcular premio para cada partido
echo "Calcular premio para cada partido:\n";
echo "Premio del partido 1 de básquetbol: ";
echo $torneo->calcularPremioPartido($partidoBasquet1)['premioPartido'] . "\n";
echo "Premio del partido 2 de básquetbol: ";
echo $torneo->calcularPremioPartido($partidoBasquet2)['premioPartido'] . "\n";
echo "Premio del partido 3 de básquetbol: ";
echo $torneo->calcularPremioPartido($partidoBasquet3)['premioPartido'] . "\n";
echo "Premio del partido 1 de fútbol: ";
echo $torneo->calcularPremioPartido($partidoFutbol1)['premioPartido'] . "\n";
echo "Premio del partido 2 de fútbol: ";
echo $torneo->calcularPremioPartido($partidoFutbol2)['premioPartido'] . "\n";
echo "Premio del partido 3 de fútbol: ";
echo $torneo->calcularPremioPartido($partidoFutbol3)['premioPartido'] . "\n";

// Mostrar objeto Torneo creado
echo "\nObjeto Torneo creado:\n";
echo $torneo;

?>
