<?php
namespace Entity;
/**
 * 
 * Llaves compuestas con relaciones(primer caso)la clave es el @id
 * Ejemplo cuando un articulo le pasa su id a otra entidad junto con Article
 *
 * @author Beimar
 */

/**
 * @Entity
 */
class ArticleAttribute {
    /**
     * @Id
     * @ManyToOne(targetEntity="Article", inversedBy="attributes")
     * @var integer(el articulo le pasa su id, osea que tiene id integer) 
     */
    private $article;
    
    /**
     * @Id
     * @Column(type="string")
     * @var string 
     */
    private $attribute;
    
    /**
     * @Column(type="string")
     * @var string 
     */
    private $value;
    
    public function __construct($attribute, $value, $article) {
        $this->attribute = $attribute;
        $this->value = $value;
        $this->article = $article;
    }
    function getArticle() {
        return $this->article;
    }

    function getAttribute() {
        return $this->attribute;
    }

    function getValue() {
        return $this->value;
    }

    function setArticle($article) {
        $this->article = $article;
    }

    function setAttribute($attribute) {
        $this->attribute = $attribute;
    }

    function setValue($value) {
        $this->value = $value;
    }


}
