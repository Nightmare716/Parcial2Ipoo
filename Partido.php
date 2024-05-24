<?php
class Partido {
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    protected $coefBase;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2) {
        $this->idpartido = $idpartido;
        $this->fecha = $fecha;
        $this->objEquipo1 = $objEquipo1;
        $this->cantGolesE1 = $cantGolesE1;
        $this->objEquipo2 = $objEquipo2;
        $this->cantGolesE2 = $cantGolesE2;
        $this->coefBase = 0.5;
    }

    public function getIdpartido() {
        return $this->idpartido;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getObjEquipo1() {
        return $this->objEquipo1;
    }

    public function getCantGolesE1() {
        return $this->cantGolesE1;
    }

    public function getObjEquipo2() {
        return $this->objEquipo2;
    }

    public function getCantGolesE2() {
        return $this->cantGolesE2;
    }

    public function getCoefBase() {
        return $this->coefBase;
    }

    public function coeficientePartido() {
        return $this->coefBase * $this->cantGolesE1 * $this->objEquipo1->getCantJugadores();
    }

    public function darEquipoGanador() {
        return ($this->cantGolesE1 > $this->cantGolesE2) ? $this->objEquipo1 :
               ($this->cantGolesE1 < $this->cantGolesE2) ? $this->objEquipo2 :
               [$this->objEquipo1, $this->objEquipo2];
    }
    

    public function __toString() {
        $cadena = "idpartido: " . $this->getIdpartido() . "\n";
        $cadena .= "Fecha: " . $this->getFecha() . "\n";
        $cadena .= "\n--------------------------------------------------------\n";
        $cadena .= "<Equipo 1>\n" . $this->getObjEquipo1() . "\n";
        $cadena .= "Cantidad Goles E1: " . $this->getCantGolesE1() . "\n";
        $cadena .= "\n--------------------------------------------------------\n";
        $cadena .= "\n--------------------------------------------------------\n";
        $cadena .= "<Equipo 2>\n" . $this->getObjEquipo2() . "\n";
        $cadena .= "Cantidad Goles E2: " . $this->getCantGolesE2() . "\n";
        $cadena .= "\n--------------------------------------------------------\n";
        return $cadena;
    }
}

?>