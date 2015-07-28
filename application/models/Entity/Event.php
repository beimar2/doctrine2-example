<?php
namespace Entity;
/**
 * Ejemplo de Doctrine de como trabajar con fechas(solo insertar datetime en el campo)
 *
 * @author Beimar
 */

/**
 * @Entity
 * @Table(name="event")
 */
class Event {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer 
     */
    private $id;
    
    /**
     * datetime sirve para los tipos de time, date and timestamp
     * (solo colocar datetime para cualquiera)
     * @Column(type="datetime")
     * @var DateTime 
     */
    private $created;
    
    /**
     * @Column(type="string")
     * @var string 
     */
    private $timezone;
    
    /**
     *
     * @var boolean 
     */
    private $localized = false;
    
    public function __construct(\DateTime $createDate) {
        $this->localized = true;
        $this->created = $createDate;
        $this->timezone = $createDate->getTimezone()->getName();
    }
    
    function getId() {
        return $this->id;
    }

    function getCreated() {
        if (!$this->localized) {
            $this->created->setTimeZone(new \DateTimeZone($this->timezone));
        }
        return $this->created;
    }

    function getTimezone() {
        return $this->timezone;
    }

    function getLocalized() {
        return $this->localized;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCreated(DateTime $created) {
        $this->created = $created;
    }

    function setTimezone($timezone) {
        $this->timezone = $timezone;
    }

    function setLocalized($localized) {
        $this->localized = $localized;
    }


}
