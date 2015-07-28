<?php
namespace Entity; 
/**
 * Ejemplo de relacion many-to-many Unidireccional junto con "Group"
 * por defecto tiene que tener una tabla intermedia
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="person")
 */
class Person {
    
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
     * @ManyToMany(targetEntity="Entity\Group")
     * @JoinTable(name="persons_groups", 
     * joinColumns={@JoinColumn(name="person_id", referencedColumnName="id")},
     * inverseJoinColumns={@JoinColumn(name="group_id", referencedColumnName="id")})
     * @var Collection 
     */
    private $groups;
    
    public function __construct($name) {
        $this->name = $name;
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }
            
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getGroups() {
        return $this->groups;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setGroups($groups) {
        $this->groups = $groups;
    }


}
