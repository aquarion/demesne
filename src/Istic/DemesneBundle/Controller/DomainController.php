<?php

namespace Istic\DemesneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

use Istic\DemesneBundle\Entity\Domain;

class DomainController extends Controller
{
    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $domain_repo = $em->getRepository('DemesneBundle:Domain');

        $usr = $this->get('security.token_storage')->getToken()->getUser();
        $domain = $domain_repo->findOneBy(
            array('id' => $id, 'user' => $usr)
        ); 
        if (!$domain) {
            throw $this->createNotFoundException('The domain does not exist, or isn\'t yours');
        }
        $em->remove($domain);
        $em->flush();
        return $this->redirectToRoute('demesne_homepage');
    }

    public function modifyAction()
    {
        return $this->render('DemesneBundle:Domain:modify.html.twig', array(
            // ...
        ));
    }

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $domain_repo = $em->getRepository('DemesneBundle:Domain');

        $usr = $this->get('security.token_storage')->getToken()->getUser();
        $domain = $domain_repo->findOneBy(
            array('id' => $id, 'user' => $usr)
        ); 
        if (!$domain) {
            throw $this->createNotFoundException('The domain does not exist, or isn\'t yours');
        }
        return $this->render('DemesneBundle:Domain:view.html.twig', array(
            'domain' => $domain
        ));
    }

    public function importAction(){

        $valid_domain = '/[^A-Za-z0-9.#\\-$]/';

        $request = Request::createFromGlobals();
        $usr = $this->get('security.token_storage')->getToken()->getUser();

        $form = $this->createFormBuilder()
            ->add('domains', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => "Add Many Domains"))
            ->getForm();

        $domains = array();
        $good_domains = array();

        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            $data = $form->getData();
            $lines = explode("\n", $data['domains']);
            foreach($lines as $line){
                trim($line);
                
                $passed = true;
                $domain = preg_split('/\s|\t|,/', $line);

                $domainname = $domain[0];
                trim($domainname);
                $domainname = str_replace('"', "", $domainname);
                $domainname = str_replace("'", "", $domainname);
                $domainname = strtolower($domainname);
                $domainline = array($domainname, "seen");

                if(!$domain[0]){
                    continue;
                }
                if(in_array($domainline, $domains)){
                    $domainline[1] = "duplicate in import";
                    $passed = false;
                } elseif ($this->findMyDomain($domainline[0])){
                    $domainline[1] = "duplicate";
                    $passed = false;
                } elseif (preg_match($valid_domain, $domainline[0])){
                    $domainline[1] = "failed_regex";
                    $passed = false;
                }
                $domains[] = $domainline;

                if($passed){
                    dump($domainname);
                    $good_domains[] = $domainline;

                    $newDomain = new Domain();
                    $newDomain->setUser($usr);
                    $newDomain->setName($domainname);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($newDomain);
                    $em->flush();
                }

            }
            dump($domains);
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            dump($form);
        }

        $template_parameters = array(
            'form' => $form->createView(),
            'domains' => $domains
        );
        return $this->render('DemesneBundle:Domain:import.html.twig', $template_parameters);

    }

    private function findMyDomain($name){
        $em = $this->getDoctrine()->getManager();
        $domain_repo = $em->getRepository('DemesneBundle:Domain');
        $usr = $this->get('security.token_storage')->getToken()->getUser();
        $domain = $domain_repo->findOneBy(
            array('name' => $name, 'user' => $usr)
        ); 
        if (!$domain) {
            return false;
        }
        return true;
    }

}
