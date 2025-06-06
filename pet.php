<?php

// Classe base abstrata
abstract class Pet {
    protected string $nome;
    protected int $nivelFome;
    protected int $nivelFelicidade;

    public function __construct(string $nome) {
        $this->nome = $nome;
        $this->nivelFome = 50;
        $this->nivelFelicidade = 50;
    }

    abstract public function interagir();
    abstract public function alimentar();

    public function status() {
        echo "Pet: {$this->nome}\n";
        echo "Fome: {$this->nivelFome}\n";
        echo "Felicidade: {$this->nivelFelicidade}\n";
        echo "-------------------------\n";
    }

    protected function ajustarNivel(&$atributo, int $valor) {
        $atributo += $valor;
        if ($atributo > 100) $atributo = 100;
        if ($atributo < 0) $atributo = 0;
    }
}

// Pet Brincalhão
class PetBrincalhao extends Pet {
    public function interagir() {
        $this->ajustarNivel($this->nivelFelicidade, 20);
        echo "{$this->nome} adorou brincar! 🥳\n";
    }

    public function alimentar() {
        $this->ajustarNivel($this->nivelFome, 10);
        echo "{$this->nome} comeu um petisco! 🍖\n";
    }
}

// Pet Preguiçoso
class PetPreguicoso extends Pet {
    public function interagir() {
        $this->ajustarNivel($this->nivelFelicidade, 5);
        echo "{$this->nome} preferia estar dormindo... 😴\n";
    }

    public function alimentar() {
        $this->ajustarNivel($this->nivelFome, 30);
        echo "{$this->nome} devorou a comida lentamente. 🍽️\n";
    }
}

// Pet Impulsivo
class PetImpulsivo extends Pet {
    public function interagir() {
        $efeito = rand(-20, 20);
        $this->ajustarNivel($this->nivelFelicidade, $efeito);
        echo "{$this->nome} teve uma reação imprevisível ao brincar. 🤪 (efeito: $efeito)\n";
    }

    public function alimentar() {
        $efeito = rand(-20, 20);
        $this->ajustarNivel($this->nivelFome, $efeito);
        echo "{$this->nome} teve uma reação estranha à comida. 🍲 (efeito: $efeito)\n";
    }
}

// ------------------------------
// Teste do simulador
// ------------------------------

$pet1 = new PetBrincalhao("Biscoito");
$pet2 = new PetPreguicoso("Mimi");
$pet3 = new PetImpulsivo("Rocky");

// Simulando interações
$pet1->interagir();
$pet1->alimentar();
$pet1->status();

$pet2->interagir();
$pet2->alimentar();
$pet2->status();

$pet3->interagir();
$pet3->alimentar();
$pet3->status();

?>
