<?php
class Torneo {
    private $partidos;
    private $importePremio;

    public function __construct($importePremio) {
        $this->partidos = [];
        $this->importePremio = $importePremio;
    }

    public function totalPremio() {
        $total = 0;
        foreach ($this->partidos as $partido) {
            $total += $partido->calcularPremio();
        }
        return $total;
    }
    
    
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido, $golesE1 = 0, $golesE2 = 0, $infracciones = 0) {
        $partido = null;
        if ($objEquipo1->getObjCategoria() == $objEquipo2->getObjCategoria() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()) {
            $idpartido = count($this->partidos) + 1;
            if ($tipoPartido == 'futbol') {
                $partido = new Fotbool($idpartido, $fecha, $objEquipo1, $golesE1, $objEquipo2, $golesE2, $this);
            } elseif ($tipoPartido == 'basket') {
                $partido = new Basket($idpartido, $fecha, $objEquipo1, $golesE1, $objEquipo2, $golesE2, $infracciones, $this);
            }
        }
        return $partido;
    }
    
    
    
    public function darGanadores($deporte) {
        $ganadores = [];
        foreach ($this->partidos as $partido) {
            if (($deporte == 'futbol' && $partido instanceof PartidoFutbol) || ($deporte == 'basket' && $partido instanceof PartidoBasket)) {
                $ganador = $partido->darEquipoGanador();
                if (is_array($ganador)) {
                    $ganadores = array_merge($ganadores, $ganador);
                } else {
                    $ganadores[] = $ganador;
                }
            }
        }
        return $ganadores;
    }

    public function calcularPremioPartido($objPartido) {
        $result = null;
    
        if ($objPartido instanceof Partido) {
            $equipoGanador = $objPartido->darEquipoGanador();
            $coefPartido = $objPartido->coeficientePartido();
            $coefPartido = max(0, min($coefPartido, 1));
            $premioPartido = $coefPartido * $this->importePremio;
            $totalPremio = $this->totalPremio();
            
            $escala = ($premioPartido + $totalPremio) != 0 ? min($this->importePremio / ($premioPartido + $totalPremio), 1) : 0;
    
            $result = [
                'equipoGanador' => $equipoGanador,
                'premioPartido' => $premioPartido * $escala
            ];
        }
    
        return $result;
    }
    
    
    public function getPartidos() {
        return $this->partidos;
    }

    public function __toString() {
        $output = "Torneo:\n";
        $output .= "Importe del Premio: $" . $this->importePremio . "\n";
        $output .= "Número de Partidos: " . count($this->partidos) . "\n";
        return $output;
    }
    public function getImportePremio() {
        return $this->importePremio;
    }
}
