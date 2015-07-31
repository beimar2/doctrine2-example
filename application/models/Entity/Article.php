<?php
namespace Entity;

/**
 * Llaves compuestas con relaciones(Primer caso) la clave es el @id
 * Ejemplo cuando un articulo le pasa su id a otra entidad junto con 
 * ArticleAttribute
 * @author Beimar
 */

/**
 * @Entity
 */
class Article {
    
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var integer 
     */
    private $id;
    
    /**
     * @Column(type="string")
     * @var string 
     */
    private $title;
    
    /**
     * @OneToMany(targetEntity="Entity\ArticleAttribute", mappedBy="article")
     * @var ArrayCollection 
     */
    private $attributes;
    
    public function __construct($title) {
        $this->title = $title;
        $this->attributes = new \Doctrine\Common\Collections\ArrayCollection();
    }
            
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getAttributes() {
        return $this->attributes;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setAttributes($attributes) {
        $this->attributes = $attributes;
    }


}
