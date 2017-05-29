<?php

namespace Istic\DemesneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Istic\DemesneBundle\Entity\Domain;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
	        return $this->dashboardAction($request);
	    }
        return $this->render('DemesneBundle:Default:index.html.twig');
    }

    public function dashboardAction(Request $request)
    {
        $newDomain = new Domain();
        $usr = $this->get('security.token_storage')->getToken()->getUser();
        $newDomain->setUser($usr);
        $form = $this->createFormBuilder($newDomain)
            ->add('name', TextType::class, array('required' => true))
            ->add('save', SubmitType::class, array('label' => "Add Domain"))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $domain = $form->getData();
            $validator = $this->get('validator');
            $errors = $validator->validate($domain);
            dump($errors);

            $em = $this->getDoctrine()->getManager();
            $em->persist($domain);
            $em->flush();
        }

    	$template_parameters = array(
    		'domains' => $usr->getDomains(),
            'form' => $form->createView()
    	);
        return $this->render('DemesneBundle:Default:dashboard.html.twig', $template_parameters);
    }


}
