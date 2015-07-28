<?php

namespace Entity;
/**
 * Description of University
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="university")
 */
class University {
    
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer 
     */
    private $id;
    
    /**
     * @Column(type="string")
     * @var integer 
     */
    private $name;
}
