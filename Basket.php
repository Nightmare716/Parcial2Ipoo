<?php

class Basket extends Partido {
    private $cantInfracciones;
    private $coefPenalizacion = 0.75;
    private $torneo;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones, $torneo) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
        $this->torneo = $torneo; 
    }

    public function getTorneo() {
        return $this->torneo;
    }

    public function getCantInfracciones() {
        return $this->cantInfracciones;
    }

    public function calcularPremio() {
        if ($this->getTorneo() !== null) {
            $coefPartido = $this->coeficientePartido();
            $premio = $coefPartido * $this->getTorneo()->getImportePremio();
            return max($premio, 0);
        } else {
            return 0;
        }
    }
    

    public function coeficientePartido() {
        $baseCoefficient = $this->getCoefBase();
        
        $coefficient = $baseCoefficient - ($this->coefPenalizacion * $this->cantInfracciones);
        
        return $coefficient;
    }
}
