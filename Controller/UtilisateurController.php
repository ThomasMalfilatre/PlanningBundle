<?php

namespace Iut\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UtilisateurController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(){

        $users = new \Iut\PlanningBundle\Entity\Users();
        $form = $this -> createForm(new \Iut\PlanningBundle\Form\UsersType(), $users);

        $request = $this -> get('request');
        if($request->getMethod() == 'POST'){
            $form->bind($request);
            if($form->isValid()){
                $e = $this->getDoctrine()->getManager();
                $e -> persist($users);
                $e -> flush(); 
            }
        }

        return $this -> render('PlanningBundle:Utilisateur:add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/id")
     * @Template()
     */
    public function showAction()
    {
    }

}
