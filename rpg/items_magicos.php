<?php

class item {
    public $nome;
    public $preco;

    public function __construct(){
        $this->nome;
        $this->preco;
    }

    public function usar() {
        echo "Você usou o item $this->nome.<br>";
        }
}

    class itemCura extends item {
        public $quantidadeCura;

        public function __construct($nome, $preco, $quantidadeCura) {
            parent::__construct();
            $this->nome = $nome;
            $this->preco = $preco;
            $this->quantidadeCura = $quantidadeCura;
        }

        public function usar() {
            echo "Você usou o item de cura $this->nome e curou $this->quantidadeCura pontos de vida.<br>";
        }
    }

    class itemAtaque extends item {
        public $dano;

        public function __construct($nome, $preco, $dano) {
            parent::__construct();
            $this->nome = $nome;
            $this->preco = $preco;
            $this->dano = $dano;
        }

        public function usar() {
            echo "Você usou o item de ataque $this->nome e causou $this->dano pontos de dano.<br>";
        }
    }

    class itembuff extends item {
        public $buff;

        public function __construct($nome, $preco, $buff) {
            parent::__construct();
            $this->nome = $nome;
            $this->preco = $preco;
            $this->defesa = $buff;
        }

        public function usar() {
            echo "Você usou o item de buff $this->nome e aumentou seu atk e defesa em $this->buff pontos.<br>";
        }
    }


$poção = new itemCura("Poção de Cura", 50, 30);
$poção->usar();

$espada = new itemAtaque("Espada Flamejante", 100, 50);
$espada->usar();

$Elixir = new itembuff("Escudo Mágico", 75, 20);
$Elixir->usar();
?>