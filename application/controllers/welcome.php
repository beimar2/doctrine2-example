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

        $this->crearProducto();
        //$this->insertarUsuario();
        //$this->encontrar();
        //$this->hacerConsulta();
        //$this->repositorio();
        $this->load->view('welcome_message');
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
        $consulta = "SELECT * FROM Usuario";
        $query = $this->em->createQuery($consulta);
        $query->setMaxResults(1);
        $usuario = $query->getResult();
    }

    public function repositorio() {
        $repUsuario = $this->em->getRepository('Entity\Usuario');


        $usuario = $repUsuario->findOneById('1');//puedes colocar el que se quiera
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