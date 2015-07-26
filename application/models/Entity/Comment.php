<?php
namespace Entity;
/**
 * Description of Comment
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="comment")
 */
class Comment {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @SequenceGenerator(sequenceName="comment_id_seq")
     * @var integer 
     */
    private $id;
    
    /**
     * @Column(type="string")
     */
    private $content;
    
    /**
     * @ManyToOne(targetEntity="Entity\User", inversedBy="comments")
     * @var Entity\User 
     */
    private $user;
    
    public function __construct($content) {
        $this->setContent($content);
    }
            
    function getId() {
        return $this->id;
    }

    function getContent() {
        return $this->content;
    }

    function getUser() {
        return $this->user;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setUser(User $user) {
        if($user === null  || $user instanceof User) {
            $this->user = $user;
        } else {
            throw new \InvalidArgumentException('$user debe ser instancis de User');
        }
        
    }


}
