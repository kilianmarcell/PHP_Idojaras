<?php

class Idojaras {
     private $id;
     private $datum;
     private $hofok;
     private $leiras;

     public function __construct(DateTime $datum, int $hofok, string $leiras) {
          $this -> datum = $datum;
          $this -> hofok = $hofok;
          $this -> leiras = $leiras;
     }

     public function getDatum() : DateTime {
          return $this -> datum;
     }

     public function getHofok() : int {
          return $this -> hofok;
     }

     public function getLeiras() : string {
          return $this -> leiras;
     }

     public function beolvas() : array {
          global $db; //olyan mintha még egyszer leírnánk a $db ... -ot

          $lekerdezes = $db   -> query('SELECT * FROM idojaras') //query -> SQL utasítás
                              -> fetchAll(); //ez adja vissza az adatbázisból az eredményt
          $lista = [];
          foreach ($lekerdezes as $elem) {
               $ujIdojaras = new Idojaras(new DateTime($elem['datum']), $elem['hofok'], $elem['leiras']);
               $ujIdojaras -> id = $elem['id'];
               $lista[] = $ujIdojaras;
          }

          return $lista;
     }
}