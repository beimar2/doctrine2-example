<?php

namespace Entity;

/**
 * Ejemplo de relacion One-to-one bidireccional junto con "Customer"
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="cart")
 */
class Cart {

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
     * @OneToOne(targetEntity="Entity\Customer", inversedBy="cart")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     * @var Entity\Comment 
     */
    private $customer;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getCustomer() {
        return $this->customer;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCustomer($customer) {
        $this->customer = $customer;
    }

}
