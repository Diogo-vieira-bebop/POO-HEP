<?php

class veiculo {
	public $modelo;
    public $velocidadeMaxima;

    public function __construct($modelo, $velocidadeMaxima) {
        $this->modelo = $modelo;
        $this->velocidadeMaxima = $velocidadeMaxima;
    }

    public function mover(){
        echo "O veículo $this->modelo está se movendo a uma velocidade de $this->velocidadeMaxima km/h.<br>";
    }

    public function mostrarInfo() {
        echo "O veículo $this->modelo parou.<br>";
    }

}

    class carroAutonomo extends veiculo {
        public function mover() {
        echo "O carro $this->modelo se movendo a uma velocidade de $this->velocidadeMaxima km/h.<br>";
    }

    }

    class drone extends veiculo {

        public $alturaMaxima;

        public function __construct($modelo, $velocidadeMaxima, $alturaMaxima) {
            parent::__construct($modelo, $velocidadeMaxima);
            $this->alturaMaxima = $alturaMaxima;
        }
        public function mover() {
        echo "O drone $this->modelo tem a $this->alturaMaxima a uma velocidade de $this->velocidadeMaxima km/h.<br>";
    }
    }

    class patineteEletrico extends veiculo {
        public function mover() {
        echo "O $this->modelo está se movendo a uma velocidade de 20 km/h.<br>";
    }
    }


$carro = new carroAutonomo("Tesla Model S", 200);

$carro->mover();
echo"<br>";
$drone = new drone("DJI Mavic", 60, 500);
$drone->mover();
echo"<br>";
$patinete = new patineteEletrico("Patinete X", 20);
$patinete->mover();

?>

