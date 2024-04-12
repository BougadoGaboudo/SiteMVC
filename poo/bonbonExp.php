<?php

class BonbonExp{
    private $idExp;
    private $nomExp;
    private $nbExp;

    function __construct($idExp,$nomExp,$nbExp){
        $this->idExp = $idExp;
        $this->nomExp = $nomExp;
        $this->nbExp = $nbExp;
    }
    function getNbExp(){
        return $this->nbExp;
    }
}