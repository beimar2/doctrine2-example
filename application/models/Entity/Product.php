<?php

namespace Entity;

/**
 * @Entity 
 * @Table(name="products")
 **/
class Product {

    /**
     * @Id 
     * @Column(type="integer")
     * @GeneratedValue(strategy = "AUTO")
     * @SequenceGenerator(sequenceName = "products_id_seq") 
     **/
    protected $id;

    /** 
     * @Column(type="string") 
     **/
    protected $name;

    function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
