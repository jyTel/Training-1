<?php
/* /templates/home/index.html.twig  */

namespace App\Controller;

use App\Entity\Users;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index() {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    /**
     * @Route("/users/show/users", name="user_showusers");
     */
    public function user_showusers() {
       
        $users = $this->getDoctrine()->getRepository(Users::class)->findAll();
        
        return $this->render('home/user_showusers.html.twig', [
            'controller_name' => 'HomeController',
            'users' => $users,
        ]);
    }
}
