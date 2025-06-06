<?php

// Classe base
abstract class Missao {
    protected string $titulo;
    protected string $descricao;
    protected string $recompensa;

    public function __construct(string $titulo, string $descricao, string $recompensa) {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->recompensa = $recompensa;
    }

    abstract public function executar();

    public function detalhes() {
        echo "Missão: {$this->titulo}\n";
        echo "Descrição: {$this->descricao}\n";
    }
}

// Missão de Exploração
class MissaoExploracao extends Missao {
    public function executar() {
        $this->detalhes();
        echo "Você explorou uma caverna antiga e encontrou: {$this->recompensa} 🧭\n\n";
    }
}

// Missão de Combate
class MissaoCombate extends Missao {
    public function executar() {
        $this->detalhes();
        echo "Você derrotou inimigos poderosos e ganhou: {$this->recompensa} ⚔️\n\n";
    }
}

// Missão de Entrega
class MissaoEntrega extends Missao {
    public function executar() {
        $this->detalhes();
        echo "Entrega concluída com sucesso! Recompensa: {$this->recompensa} 💰\n\n";
    }
}

// ------------------------------
// Desafio extra: Sorteador de missão por nível
// ------------------------------

function sortearMissaoAleatoria(int $nivel): Missao {
    // Sorteio com base no nível do jogador
    if ($nivel < 5) {
        // Mais chance de entrega ou exploração no início
        $tipos = ['entrega', 'exploracao', 'entrega'];
    } elseif ($nivel < 10) {
        $tipos = ['exploracao', 'combate', 'entrega'];
    } else {
        $tipos = ['combate', 'combate', 'exploracao'];
    }

    $tipo = $tipos[array_rand($tipos)];

    switch ($tipo) {
        case 'exploracao':
            return new MissaoExploracao(
                "Ruínas Misteriosas",
                "Investigue a floresta e descubra segredos antigos.",
                "Mapa antigo e 50 XP"
            );
        case 'combate':
            return new MissaoCombate(
                "Ataque Orc",
                "Derrote os orcs que ameaçam a vila.",
                "120 XP e Espada de Aço"
            );
        case 'entrega':
        default:
            return new MissaoEntrega(
                "Entrega de suprimentos",
                "Leve ervas medicinais ao acampamento aliado.",
                "25 moedas de ouro"
            );
    }
}

// ------------------------------
// Teste do gerador de missões
// ------------------------------

function simularJogador(string $nome, int $nivel) {
    echo "===== Jogador: $nome (Nível $nivel) =====\n";
    $missao = sortearMissaoAleatoria($nivel);
    $missao->executar();
}

// Simulando diferentes jogadores
simularJogador("Arthas", 3);
simularJogador("Luna", 7);
simularJogador("Thorin", 12);

?>
