<?php
namespace Entity;

/**
 * Ejemplo de relacion many-to-many Bidireccional junto con "Teacher"
 * (mas sencillo que el unidireccional)
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="course")
 */
class Course {
    
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
     * @ManyToMany(targetEntity="Entity\Teacher", mappedBy="courses")
     * 
     * @var Collection 
     */
    private $teachers;
    
    public function __construct($name) {
        $this->name = $name;
        $this->teachers = new \Doctrine\Common\Collections\ArrayCollection();
    }
            
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getTeachers() {
        return $this->teachers;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setTeachers($teachers) {
        $this->teachers = $teachers;
    }


}
