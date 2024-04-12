<?php

class Pokemon{
    private $idP;
    private $nomP;
    private $typeP;
    private $experience;
    private $generation;

    function __construct($idP,$nomP,$typeP,$experience,$generation){
        $this->idP = $idP;
        $this->nomP = $nomP;
        $this->typeP = $typeP;
        $this->experience = $experience;
        $this->generation = $generation;
    }
    function getExperience(){
        return $this->experience;
    }
    function ajouterExperience(BonbonExp $unBonbonExp){
        $totalExp = 0;
        $totalExp += $unBonbonExp->getNbExp();
    }
}