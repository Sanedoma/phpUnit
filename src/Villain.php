<?php
namespace Sanedoma\TpTestUnitaire;
class Villain extends Personnage {
    // Constructeur
    public function __construct($nom, $hp, $atk) {
        parent::__construct($nom, $hp, $atk);
    }

    public function attaquer($p) {
        if ($p instanceof SuperHero) {
            // Inflige 120% des dégâts contre un SuperHero
            $degats = (int)(1.2 * $this->atk);
        }  elseif($p instanceof AntiHero){
            //inflige 10% de plus 
            $degats = (int)(1.1 * $this->atk);
        }else {
            // Inflige les dégâts normaux pour les autres personnages
            $degats = $this->atk;
        }

        if (!$this->estKO()) {
            $p->recevoirDegats($degats);
        }
    }
}

?>
