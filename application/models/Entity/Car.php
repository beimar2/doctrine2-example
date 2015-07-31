<?php
namespace Entity;

/**
 * la clave es el @id
 * Ejemplo de llaves primarias compuestas(la llave esta compuesta por dos atributos )
 * Funciona siempre y cuando las llaves sean del tipo "integer" o "string"
 * Tambien las llaves tienen que estar inicializadas antes de guardar(persist)
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="car")
 */
class Car {
    
   /**
    * @Id
    * @Column(type="string")
    * @var string 
    */ 
   private $name;
   
   /**
    * Este atributo puede ser autogenerable
    * @Id
    * @Column(type="integer")
    * @var integer 
    */
   private $year;
   
   public function __construct($name, $year) {
       $this->name = $name;
       $this->year = $year;
   }
           
   function getName() {
       return $this->name;
   }

   function getYear() {
       return $this->year;
   }

   function setName($name) {
       $this->name = $name;
   }

   function setYear($year) {
       $this->year = $year;
   }


}
