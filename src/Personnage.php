<?php
namespace Sanedoma\TpTestUnitaire;

class Personnage {
    // Attributs
    public $nom;
    public $hp;
    public $atk;

    // Constructeur
    public function __construct($nom, $hp, $atk) {
        $this->nom = $nom;
        $this->hp = $hp;
        $this->atk = $atk;
    }

    // Méthode estKO()
    public function estKO() {
        return $this->hp <= 0;
    }

    // Méthode attaquer()
    public function attaquer($p) {
        if (!$this->estKO()) {
            $p->recevoirDegats($this->atk);
        }
    }

    // Méthode pour recevoir les dégâts
    public function recevoirDegats($degats) {
        $this->hp -= $degats;
    }

    // Méthode toString() pour afficher les informations du personnage
    public function __toString() {
        return "Nom: " . $this->nom . ", HP: " . $this->hp . ", Attaque: " . $this->atk;
    }
}

?>



