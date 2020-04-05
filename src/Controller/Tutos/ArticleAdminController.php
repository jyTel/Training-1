<?php

namespace App\Controller\Tutos;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface; 


use App\Form\ArticleFormType;
use App\Entity\Tutos\Article;
use App\Repository\Tutos\ArticleRepository;

class ArticleAdminController extends AbstractController
{
//     /**
//      * @Route("admin/article", name="admin_article")
//      */
//     public function index()
//     {
//         return $this->render('Tutos/article_admin/index.html.twig', [
//             'controller_name' => 'ArticleAdminController',
//         ]);
//     }
    
    /**
     * @Route("admin/article/new", name="admin_article_new")
     */
    public function new(EntityManagerInterface $em, Request $request) {
        //die('todo');
        
        $form = $this->createForm(ArticleFormType::class);
    
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //dd($form->getData());
            $data = $form->getData();
            $article = new Article();
            $article->setTitle($data['title']);
            $article->setContent($data['content']);
            $article->setSlug('SLUG');
            
            $em->persist($article);
            $em->flush();
            
            return $this->redirectToRoute('home');
        }
        
        
        return $this->render('Tutos/article_admin/new.html.twig', [
            'controller_name' => 'ArticleAdminController',
            'articleForm' => $form->createView(),
        ]);
        
        
//         return new Response(sprintf(
//             'Hiya! New article id: #%d slug: %s',
//             $article->getId(),
//             $article->getSlug()
//         ));

    
    }
    
    /**
     * @Route("/admin/article/{id}/edit")
     */
    public function edit(Article $article) {
        dd($article);   
    }
   
    /**
     * @Route("/admin/article")
     */
    public function list(ArticleRepository $articleRepo) {
        
        $articles = $articleRepo->findAll();
        
        return $this->render('Tutos/article_admin/list.html.twig',[
            'controller_name' => 'ArticleAdminController',
            'articles' => $articles,
        ]);
    }
    
    
}
