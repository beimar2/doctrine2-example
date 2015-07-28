<?php
namespace Entity;

/**
 * Ejemplo de relacion many-to-many Bidireccional junto con "Teacher"
 * (mas sencillo que el unidireccional)
 * !!importa mucho el orden de teacher_courses (el inversedBy tiene que estar aqui)
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="teacher")
 */
class Teacher {
    
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
     * @ManyToMany(targetEntity="Entity\Course", inversedBy="teachers")
     * @JoinTable(name="teachers_courses")
     * @var ArrayColletion 
     */
    private $courses;
    
    public function __construct($name) {
        $this->name = $name;
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
    }
            
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getCourses() {
        return $this->courses;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCourses($courses) {
        $this->courses = $courses;
    }


}
