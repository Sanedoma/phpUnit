<?php
namespace Sanedoma\TpTestUnitaire;


class SuperHero extends Personnage {
    // Constructeur
    public function __construct($nom, $hp, $atk) {
        parent::__construct($nom, $hp, $atk);
    }

    // Redéfinir la méthode attaquer pour infliger 80% des dégâts
    public function attaquer($p) {
        if ($p instanceof Villain) {
            // Inflige 80% des dégâts
            $degats = (int)(0.8 * $this->atk);
            
        } elseif($p instanceof AntiHero){
            //inflige 10% de plus 
            $degats = (int)(1.1 * $this->atk);
        }else {
            $degats = $this->atk;
        }

        if (!$this->estKO()) {
            $p->recevoirDegats($degats);
        }
    }
}

?>
