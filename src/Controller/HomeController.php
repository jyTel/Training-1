<?php
/* /Controller/HomeController.php  */

namespace App\Controller;

use App\Entity\User;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//Gestion des formulaires-------------------------------------------//
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//------------------------------------------------------------------//


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
     * @Method({"GET"})
     */
    public function user_showusers() {
       
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        
        return $this->render('home/user_showusers.html.twig', [
            'controller_name' => 'HomeController',
            'users' => $users,
        ]);
    }
    
    /**
     * @Route("/users/new/user", name="user_newuser");
     * @Method({"GET", "POST"})
     */
    public function user_newuser(Request $request) {
        
        $user = new User();
        
        $form = $this->createFormBuilder($user)
            ->add('Name', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Lastname', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Username', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Mail', EmailType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Password', PasswordType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('PasswordCheck', PasswordType::class, [
                'label' => 'Reenter password',
                'attr' => ['class' => 'form-control']
            ])
            ->add('Role', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
            ->add('cancel', ResetType::class, [
                'label' => 'Clear',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
            ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            
            return $this->redirectToRoute('user_showusers');
            
        }
        
        return $this->render('home/user_newuser.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
        ]);
    }
    
}
