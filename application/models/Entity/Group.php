<?php
namespace Entity;

/**
 * Ejemplo de relacion many-to-many Unidireccional junto con "Person"
 * por defecto tiene que tener una tabla intermedia
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="groupapp")
 */
class Group {
    
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer 
     */
    private $id;
    
    /**
     * @Column(type="string")
     * @var string 
     */
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
            
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }


}
