<?php

namespace Entity;
/**
 * Ejemplo de relacion Many-to-one unidireccional(no existe el many-to-one bidirecc..)
 * Junto con Address
 * Este tipo de relacion se utiliza con tipos de valores y tambien con
 * Atributos compuestos
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="usuario")
 */
class Usuario {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @SequenceGenerator(sequenceName="usuario_id_seq")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $username;

    /**
     * @Column(type="string")
     */
    protected $password;

    /**
     * @Column(type="string")
     */
    protected $email;

    /**
     * Este tipo de relacion se usa para los atributos compuestos o Tipos de Valores
     * @ManyToOne(targetEntity="Entity\Address")
     * @var Address 
     */
    protected $address;
    
    /**
     *
     * @var type 
     */
    protected $university;

    function getAddress() {
        return $this->address;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
