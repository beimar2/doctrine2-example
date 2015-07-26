<?php
namespace Entity;

/**
 * Description of User
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="user")
 */
class User {
    
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
    private $login;
    
    /**
     * @OneToMany(targetEntity="Entity\Comment", mappedBy="user")
     * @var collection 
     */
    private $comments;
    
    public function __construct($login) {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->login = $login;
    }
    
    public function addComment(Comment $comment) {
        $this->comments->add($comment);
        $comment->setUser($this);
    }
            
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getComments() {
        return $this->comments;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setComments(collection $comments) {
        $this->comments = $comments;
    }


}
