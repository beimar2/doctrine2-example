<?php
namespace Entity;
/**
 * Ejemplo de relacion One-to-one bidireccional junto con "Cart"
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="customer")
 */
class Customer {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var interger 
     */
    private $id;
    
    /**
     * @Column(type="string")
     * @var string 
     */
    private $name;
    
    /**
     * @OneToOne(targetEntity="Entity\Cart", mappedBy="customer")
     * @var Cart 
     */
    private $cart;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getCart() {
        return $this->cart;
    }

    function setId(interger $id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCart(Cart $cart) {
        $this->cart = $cart;
    }


}
