<?php
class Fotbool extends Partido {
    private $cantInfracciones;
    private $coefMenores = 0.13;
    private $coefJuveniles = 0.19;
    private $coefMayores = 0.27;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $torneo) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->torneo = $torneo; 
    }

    public function calcularPremio() {
        $coeficientePartido = $this->coeficientePartido();
        $importePremio = $this->torneo->getImportePremio(); 
        return $coeficientePartido * $importePremio;
    }

    public function coeficientePartido() {
        $coefBase = $this->getCoefBase();
        $coefCategoria = $this->getCoefCategoria();
        $cantGolesE1 = $this->getCantGolesE1();
        $cantGolesE2 = $this->getCantGolesE2();

        return $coefBase * ($cantGolesE1 + $cantGolesE2) * $coefCategoria;
    }

    private function getCoefCategoria() {
        $categoria = $this->getObjEquipo1()->getObjCategoria();
        if ($categoria->getIdCategoria() == 1) {
            return $this->coefMenores;
        } elseif ($categoria->getIdCategoria() == 2) {
            return $this->coefJuveniles;
        } else {
            return $this->coefMayores;
        }
    }
}