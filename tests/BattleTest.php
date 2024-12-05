<?php

use Sanedoma\TpTestUnitaire\AntiHero;
use Sanedoma\TpTestUnitaire\Personnage;
use Sanedoma\TpTestUnitaire\SuperHero;
use Sanedoma\TpTestUnitaire\Villain;
use PHPUnit\Framework\TestCase;

class BattleTest extends TestCase {

    public function testSuperHeroAttaqueVillain() {
        // Création des personnages
        $superhero = new SuperHero("Superman", 100, 20);
        $villain = new Villain("Joker", 100, 15);
        
        echo "Avant l'attaque: Superman HP = " . $superhero->hp . ", Joker HP = " . $villain->hp . "\n";

        // Attaque du superhéros contre le villain (80% des dégâts)
        $superhero->attaquer($villain);
        
        echo "Après l'attaque: Superman HP = " . $superhero->hp . ", Joker HP = " . $villain->hp . "\n";
        
        // Vérification que le villain a perdu des HP
        $this->assertEquals(84, $villain->hp, "Le villain devrait avoir 84 HP après l'attaque.");
    }

    public function testVillainAttaqueSuperHero() {
        // Création des personnages
        $superhero = new SuperHero("Superman", 100, 20);
        $villain = new Villain("Joker", 100, 15);
        
        echo "Avant l'attaque: Superman HP = " . $superhero->hp . ", Joker HP = " . $villain->hp . "\n";

        // Attaque du villain contre le superhéros (120% des dégâts)
        $villain->attaquer($superhero);
        
        echo "Après l'attaque: Superman HP = " . $superhero->hp . ", Joker HP = " . $villain->hp . "\n";

        // Vérification que le superhéros a perdu des HP
        $this->assertEquals(82, $superhero->hp, "Le superhéros devrait avoir 82 HP après l'attaque.");
    }

    public function testAntiHeroSubitDegats() {
        // Création des personnages
        $antiHero = new AntiHero("Deadpool", 100, 18);
        $villain = new Villain("Joker", 100, 15);
        
        echo "Avant l'attaque: Deadpool HP = " . $antiHero->hp . ", Joker HP = " . $villain->hp . "\n";

        // Attaque du villain contre l'anti-héros
        $villain->attaquer($antiHero);
        
        echo "Après l'attaque: Deadpool HP = " . $antiHero->hp . ", Joker HP = " . $villain->hp . "\n";

        // Vérification que l'anti-héros a perdu des HP avec 10% de dégâts en plus
        $this->assertEquals(84, $antiHero->hp, "L'anti-héros devrait avoir 84 HP après l'attaque (dégâts augmentés de 10%).");
    }

    public function testCombatEntreSuperHeroEtVillain() {
        // Création des personnages
        $superhero = new SuperHero("Superman", 100, 20);
        $villain = new Villain("Joker", 100, 15);

        echo "Avant les attaques: Superman HP = " . $superhero->hp . ", Joker HP = " . $villain->hp . "\n";

        // Simulation de quelques attaques
        $superhero->attaquer($villain); // Superhéros attaque le villain
        $villain->attaquer($superhero); // Villain attaque le superhéros
        
        echo "Après les attaques: Superman HP = " . $superhero->hp . ", Joker HP = " . $villain->hp . "\n";

        // Vérification que le superhéros a perdu des HP après l'attaque du villain
        $this->assertEquals(82, $superhero->hp, "Le superhéros devrait avoir 82 HP après l'attaque du villain.");
        // Vérification que le villain a perdu des HP après l'attaque du superhéros
        $this->assertEquals(84, $villain->hp, "Le villain devrait avoir 84 HP après l'attaque du superhéros.");
    }

    public function testAntiHeroSubitPlusDeDegats() {
        // Création des personnages
        $antiHero = new AntiHero("Deadpool", 100, 18);
        $superhero = new SuperHero("Superman", 100, 20);
        
        echo "Avant l'attaque: Deadpool HP = " . $antiHero->hp . ", Superman HP = " . $superhero->hp . "\n";

        // Attaque du superhéros contre l'anti-héros
        $superhero->attaquer($antiHero);
        
        echo "Après l'attaque: Deadpool HP = " . $antiHero->hp . ", Superman HP = " . $superhero->hp . "\n";

        // Vérification que l'anti-héros subit 10% de dégâts en plus
        $this->assertEquals(78, $antiHero->hp, "L'anti-héros devrait avoir 78 HP après avoir reçu une attaque du superhéros.");
    }

    public function testEstKO() {
        // Création des personnages
        $superhero = new SuperHero("Superman", 100, 20);
        
        echo "Avant l'attaque: Superman HP = " . $superhero->hp . "\n";

        // Vérifier que le personnage n'est pas KO au départ
        $this->assertFalse($superhero->estKO(), "Le superhéros ne devrait pas être KO au début.");

        // Attaquer avec des dégâts suffisants pour le mettre KO
        $superhero->recevoirDegats(100);
        
        echo "Après l'attaque: Superman HP = " . $superhero->hp . "\n";

        // Vérifier que le personnage est maintenant KO
        $this->assertTrue($superhero->estKO(), "Le superhéros devrait être KO après avoir perdu tous ses HP.");
    }
}
