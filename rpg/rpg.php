<?php

class Personagem {
    public $nome;
    public $vida;
    public $forca;
    public $defesa;

    public function __construct($nome, $vida, $forca, $defesa) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->forca = $forca;
        $this->defesa = $defesa;
    }

    public function atacar($alvo) {
        // Para sobrescrever
    }

    public function defender($dano) {
        // Para sobrescrever
    }

    public function status() {
        echo "<br>" . str_repeat("-", 30) . "<br>";
        echo "Nome: $this->nome<br>";
        echo "Vida: $this->vida<br>";
        echo "Força: $this->forca<br>";
        echo "Defesa: $this->defesa<br>";
        echo str_repeat("-", 30) . "<br>";
    }

    public function estaVivo() {
        return $this->vida > 0;
    }

    public function getNome() {
        return $this->nome;
    }
}

class Guerreiro extends Personagem {
    public function atacar($alvo) {
        $dano = $this->forca * 1.2;
        echo "<br>$this->nome ataca com espada causando $dano de dano!<br>";
        $alvo->defender($dano);
    }

    public function defender($dano) {
        $danoReduzido = $dano - ($this->defesa * 0.1);
        $this->vida -= max($danoReduzido, 0);
        echo "$this->nome defende e recebe $danoReduzido de dano!<br>";
    }s
}

class Mago extends Personagem {
    public $mana;

    public function __construct($nome, $vida, $forca, $defesa, $mana) {
        parent::__construct($nome, $vida, $forca, $defesa);
        $this->mana = $mana;
    }

    public function atacar($alvo) {
        $dano = $this->forca + ($this->mana / 2);
        echo "<br>$this->nome lança magia causando $dano de dano!<br>";
        $alvo->defender($dano);
    }

    public function defender($dano) {
        $danoReduzido = $dano - $this->defesa;
        $this->vida -= max($danoReduzido, 0);
        echo "$this->nome usa magia de proteção e recebe $danoReduzido de dano!<br>";
    }
}

class Arqueiro extends Personagem {
    public $precisao;

    public function __construct($nome, $vida, $forca, $defesa, $precisao) {
        parent::__construct($nome, $vida, $forca, $defesa);
        $this->precisao = $precisao;
    }

    public function atacar($alvo) {
        $dano = $this->forca + ($this->precisao * 0.4);
        echo "<br>$this->nome dispara flecha causando $dano de dano!<br>";
        $alvo->defender($dano);
    }

    public function defender($dano) {
        if (rand(1, 100) <= 25) {
            echo "$this->nome esquivou do ataque!<br>";
        } else {
            $danoReduzido = $dano - $this->defesa;
            $this->vida -= max($danoReduzido, 0);
            echo "$this->nome não conseguiu esquivar e recebe $danoReduzido de dano!<br>";
        }
    }
}

function batalha($p1, $p2) {
    echo "<br>" . str_repeat("=", 50) . "<br>";
    echo "BATALHA ENTRE {$p1->getNome()} E {$p2->getNome()}<br>";
    echo str_repeat("=", 50) . "<br>";

    $turno = 1;
    while ($p1->estaVivo() && $p2->estaVivo()) {
        echo "<br>=== Turno $turno ===<br>";

        $p1->atacar($p2);
        if (!$p2->estaVivo()) break;

        $p2->atacar($p1);
        if (!$p1->estaVivo()) break;

        echo "<br>";
        $p1->status();
        $p2->status();
        $turno++;
    }

    echo "<br>" . str_repeat("=", 40) . "<br>";
    echo "======= FIM DA BATALHA =======<br>";
    echo ($p1->estaVivo() ? "{$p1->getNome()} venceu!" : "{$p2->getNome()} venceu!") . "<br>";
    echo str_repeat("=", 40) . "<br>";
}

// EXEMPLO
$guerreiro = new Guerreiro("Thorin", 100, 25, 15);
$mago = new Mago("Gandalf", 60, 18, 10, 40);

batalha($guerreiro, $mago);