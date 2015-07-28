<?php
namespace Entity;

/**
 * Ejemplo de relacion one-to-many Recursivo(Jerarquia)
 * Como si fuera bidireccional(mappedBy and inversedBy)
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="category")
 */
class Category {
    
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
     * @OneToMany(targetEntity="Entity\Category", mappedBy="parent")
     * @var Collection 
     */
    private $children;
    
    /**
     * @ManyToOne(targetEntity="Entity\Category", inversedBy="children")
     * @JoinColumn(name="parent_id", referencedColumnName="id")
     * @var Entity\Category 
     */
    private $parent;
    
    public function __construct($name) {
        $this->name = $name;
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
            
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getChildren() {
        return $this->children;
    }

    function getParent() {
        return $this->parent;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setChildren($children) {
        $this->children = $children;
    }

    function setParent($parent) {
        $this->parent = $parent;
    }


}
