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
        
        $this->addEmployeeFriends();
        //$this->addTeacherToCourse();
        //$this->addPersonAndGroup();
        //$this->addCategory();
        //$this->recuperarMentor();
        //$this->designarMentorAStudent();
        //$this->addStudent();
        //$this->addEvent();
        //$this->addCustomer();
        //$this->addAddress();
        //$this->encontrarComment();
        //$this->eliminarComentariodeUnUsuario();
        //$this->agregarUnComentarioAUsuarioExistente();
        //$this->encontrarUsuarioYSusComentarios();
        //$this->agregarComentarios();
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
    
    public function addEmployeeFriends() {
        //$employee = new \Entity\Employee('Elga Choque');
        
        $beimar = $this->em->find('Entity\Employee', 1);
        $employee = $this->em->find('Entity\Employee', 3);
        
        //para agregar Amigos
        //$beimar->getMyFriends()->add($employee);
        
        echo $employee->getName();
        
        
        //$this->em->persist($employee);
        
        $this->em->flush();
    }


    public function addTeacherToCourse() {
        //agregar
        //$teacher = new \Entity\Teacher("Maria Senta");
        //$course = new Entity\Course("Computacion");
        
        //asignar
        //$teacher = $this->em->find('Entity\Teacher', 3);
        //$course = $this->em->find('Entity\Course', 2);
        //$teacher->getCourses()->add($course);
        
        //recuperar cursos de un profesor(De un lado)
        $teacher = $this->em->find('Entity\Teacher', 2);
        $courses = $teacher->getCourses();
        echo 'Los cursos de :'.$teacher->getName().' Son: <br>';
        foreach ($courses as $course){
            echo 'Course : '.$course->getName() .'<br>';
            
        }
        
        //recuperar profesores de un curso(Del otro lado)
        $course = $this->em->find('Entity\Course', 1);
        $teachers = $course->getTeachers();
        echo 'Los profesores de :'.$course->getName().' Son: <br>';
        foreach ($teachers as $teacher){
            echo 'Profesores : '.$teacher->getName() .'<br>';
            
        }
        
        //$this->em->persist($course);
        //$this->em->persist($teacher);
        $this->em->flush();
    }


    public function addPersonAndGroup() {
        //$person = new Entity\Person("Jorge Huarachi");
        //$familia = new \Entity\Group("Colegio Bolivar");
        
        $familia = $this->em->find('Entity\Group', 3);
        $person = $this->em->find('Entity\Person', 3);
         
        
        
        $person->getGroups()->add($familia);
        
        //$this->em->persist($familia);
        //$this->em->persist($person);
        $this->em->flush();
    }


    public function addCategory() {
        //$category = new Entity\Category("subteniente");
        $parent = $this->em->find('Entity\Category', 1);
        
        $grandFather = $parent->getParent();
        
        echo 'abuelo es :'.$grandFather->getId().'  Name of category:'. $grandFather->getName();
        echo '<br>';
        $children = $parent->getChildren();
        foreach ($children as $son){
            echo $son->getId().' Nombre de categoria:'.$son->getName().'<br>';
        }
        echo 'HOla a todos <br>';
        $cat = $this->em->getRepository('Entity\Category')->findBy(array('name' => 'mayor'));
        foreach ($cat as $son){
            echo $son->getId().' Nombre de categoria:'.$son->getName().'<br>';
        }
        
        //$category->setParent($parent);
        
        //$this->em->persist($category);
        //$this->em->flush();
    }


    public function recuperarMentor() {
        $student = $this->em->find('Entity\Student', 4);
        
        $mentor = $student->getMentor();
                
        echo $mentor->getName().' Id: '.$mentor->getId();
    }


    public function designarMentorAStudent() {
        try {
            $student = new \Entity\Student("Elena Huarachi");
        
            $mentor = $this->em->find('Entity\Student', 11);
        
            $student->setMentor($mentor);
        
            //$this->em->persist($mentor);
            $this->em->persist($student);
        
            $this->em->flush();
        } catch (Exception $ex) {
            echo 'la estudiante '.$mentor->getName().'ya esta designada';
        }
        
    }


    public function addStudent() {
        $student = new \Entity\Student("Jorge Huarachi");
        
        $mentor = new \Entity\Student("Maria Lopez");
        
        $student->setMentor($mentor);
        
        $this->em->persist($mentor);
        $this->em->persist($student);
        
        $this->em->flush();
    }


    public function addEvent() {
        date_default_timezone_set('America/Manaus');
        $event = new Entity\Event(new DateTime());
        
        $this->em->persist($event);
        $this->em->flush();
    }


    public function addCustomer() {
        $customer = new Entity\Customer();
        $customer->setName("Orlando");
        
        $cart = new \Entity\Cart();
        $cart->setName("C7");
        
        $customer->setCart($cart);
        $cart->setCustomer($customer);
        
        $this->em->persist($cart);
        $this->em->persist($customer);
        
        
        $this->em->flush();
    }


    public function addAddress() {
        $usuario = $this->em->find('Entity\Usuario',18);
        if($usuario) {
            echo $usuario->getId();
            $address = $usuario->getAddress();
            echo $address->getId();
        }
        
        
//        $address = new \Entity\Address();
//        $address->setStreet("San Martin");
//        
//        $usuario = new Entity\Usuario();
//        $usuario->setUsername('jorge');
//        $usuario->setPassword('juliamamani');
//        $usuario->setEmail('jorge020@gmail.com');
//        
//        $usuario->setAddress($address);
//        
//        
//        $this->em->persist($address);
//        $this->em->persist($usuario);
//        $this->em->flush();
    }

    public function encontrarComment() {
        $comment = $this->em->find('Entity\Comment',18);
       
        echo $comment->getId().$comment->getContent();
        $user = $comment->getUser();
        echo $user->getId();
    }

    

    public function eliminarComentariodeUnUsuario() {
        $user = $this->em->find('Entity\User',26);
        
        if($user) {
            echo 'El usuario:', $user->getLogin().' tiene :' .$user->getComments()->count();
            if($comment = $user->getComments()->first()) {
                echo 'El comentario: '. $comment->getId(). 'sera eliminado';
                $this->em->remove($comment);
                $this->em->flush();
            }
        } else {
            echo 'No existe el usuario';
        }
    }


    public function agregarUnComentarioAUsuarioExistente() {
        $user = $this->em->find('Entity\User', 26);
        if($user) {
            echo 'El usuario :'.$user->getLogin().' Hizo :'.$user->getComments()->count().' Comentarios';
            $comment = new \Entity\Comment("HOla como estan, me siento feliz");
            $comment->setUser($user);
            $this->em->persist($comment);
            $this->em->flush();
        } else {
            echo 'No existe ese usuario';
        }
    }


    public function encontrarUsuarioYSusComentarios() {
        $user = $this->em->find('Entity\User',10);
        
        if($user) {
            //siempre utilizar de esta manera(concatenando) nunca dentro de comillas dobles
            echo 'El Usuario:'. $user->getId().' con login :'. $user->getLogin().'<br>';
            echo 'Hizo los siguientes comentarios: <br>';
           
            foreach ($user->getComments() as $comment) {
                echo 'Id de comentario :'. $comment->getId() . '<br> Comentario <br>' .
                    $comment->getContent().'<br>';
               
                
            }
        } else {
            echo 'NO existe ese usuario';
        }
    }

    public function agregarComentarios() {
        $user = new \Entity\User("beimar huarachi");
        
        
        $this->em->persist($user);
        
        $comment = new Entity\Comment("yo soy beimar huarachi");
        $comment2 = new Entity\Comment("todos a la miercole");
        
        $user->addComment($comment);
        $user->addComment($comment2);
        
        /**
         * se tiene que guardar todas las que estan en la coleccion o va a dar error
         * O buscar algo con cascade(ej: cascade={"persist"}) esto hace todas las in
         * incersiones automaticamente
         */
        //$this->em->persist($comment);
        //$this->em->persist($comment2);
        
        
        
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