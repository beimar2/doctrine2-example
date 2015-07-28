<?php
namespace Entity;

/**
 * Ejemplo de relacion many-to-many Recursivo
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="employee")
 */
class Employee {
    
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
     * @ManyToMany(targetEntity="Entity\Employee", mappedBy="myFriends")
     * @var ArrayCollection
     * quienes me han agregado como amigos 
     */
    private $friendsWithMe;
    
    /**
     * @ManyToMany(targetEntity="Entity\Employee", inversedBy="friendsWithMe")
     * @JoinTable(name="friends", 
     * joinColumns={@JoinColumn(name="employee_id", referencedColumnName="id")},
     * inverseJoinColumns={@JoinColumn(name="friend_employee_id", referencedColumnName="id")})
     * @var ArrayCollection 
     * los amigos que yo he agregado
     */
    private $myFriends;
    
    public function __construct($name) {
        $this->name = $name;
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
    }
            
    function getFriendsWithMe() {
        return $this->friendsWithMe;
    }

    function setFriendsWithMe($friendsWithMe) {
        $this->friendsWithMe = $friendsWithMe;
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getMyFriends() {
        return $this->myFriends;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setMyFriends($myFriends) {
        $this->myFriends = $myFriends;
    }


}
