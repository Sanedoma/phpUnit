<?php
namespace Sanedoma\TpTestUnitaire;

class AntiHero extends Personnage {
    // Constructeur
    public function __construct($nom, $hp, $atk) {
        parent::__construct($nom, $hp, $atk);
    }

    // Méthode attaquer() : inflige des dégâts augmentés de 50% pour un anti-héros
    public function attaquer($p) {
        // Inflige des dégâts normaux
        $degats = $this->atk;
        if (!$this->estKO()) {
            $p->recevoirDegats($degats);
        }
    }

}

?>

