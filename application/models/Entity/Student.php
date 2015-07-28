<?php
namespace Entity;
/**
 * Ejemplo de relacion UNO a UNo Recursivo en doctrine
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="student")
 */
class Student {
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
    
    /**
     * @OneToOne(targetEntity="Entity\Student")
     * @var integer 
     */
    private $mentor;

    public function __construct($name) {
        $this->setName($name);
    }
            
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getMentor() {
        return $this->mentor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setMentor($mentor) {
        $this->mentor = $mentor;
    }


}
