<?php
namespace Entity;
/**
 * Description of Address
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="address")
 */
class Address {
    
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer 
     */
    protected $id;
    
    /**
     * @Column(type="string")
     * @var string 
     */
    protected $street;
    
    function getId() {
        return $this->id;
    }

    function getStreet() {
        return $this->street;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setStreet($street) {
        $this->street = $street;
    }


}
