<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public $em;

    public function index() {
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;

        $this->agregarComentarios();
        //$this->crearProducto();
        //$this->insertarUsuario();
        //$this->encontrar();
        //$this->hacerConsulta();
        //$this->repositorio();
        //$data['title'] = 'Tutorial';
        //$data['heading'] = "My Real Heading";
        //$datos = array('nombre' => 'Beimar', 'Apellido' => 'Huarachi');

        $this->load->view('welcome_message');
    }

    public function agregarComentarios() {
        $user = new \Entity\User("irma");
        $this->em->persist($user);
        
        $comment = new Entity\Comment("yo soy irma");
        $comment2 = new Entity\Comment("tienen derecho a pensar diferente");
        
        $user->addComment($comment);
        $user->addComment($comment2);
        
        /**
         * se tiene que guardar todas las que estan en la coleccion o va a dar error
         * O buscar algo con cascade
         */
        $this->em->persist($comment);
        $this->em->persist($comment2);
        
        
        
        $this->em->flush();
    }

    public function dismount($object) {
        $reflectionClass = new ReflectionClass(get_class($object));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }

    public function crearProducto() {
        $product = new \Entity\Product();
        //$product->setId(1);
        $product->setName('jhon');

        $this->em->persist($product);
        $this->em->flush();
    }

    public function encontrar() {
        $product = $this->em->find('Entity\Product', 1);
        $user = $this->em->find('Entity\Usuario', 1);
        echo $product->getName() . '<br>' . $product->getId();
        echo $user->getEmail() . '<br>' . $user->getId();
    }

    public function hacerConsulta() {
        $consulta = "SELECT p.id, p.name FROM Entity\Product p";
        $query = $this->em->createQuery($consulta);
        $query->setMaxResults(1);
        $product = $query->getResult();
        return $product;
    }

    public function repositorio() {
        $repUsuario = $this->em->getRepository('Entity\Usuario');


        $usuario = $repUsuario->findOneById('1'); //puedes colocar el que se quiera
        $nombreUsuario = '';
        if (!is_null($usuario)) {
            $nombreUsuario = $usuario->getEmail();
        }
        echo $nombreUsuario;
    }

    public function insertarUsuario() {

        $usuario = new \Entity\Usuario();
        $usuario->setUsername('beimar');
        $usuario->setPassword('beimar123');
        $usuario->setEmail('beimar020@gmail.com');

        $this->em->persist($usuario);
        $this->em->flush();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */