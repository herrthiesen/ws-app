<?php

namespace ws\wsAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ws\wsAppBundle\Form\Type\RegistrationType;
use ws\wsAppBundle\Form\Model\Registration;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'wswsAppBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
    
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();

            $em->persist($registration->getUser());
            $em->flush();

            return $this->redirect('wswsAppBundle:Security:login.html.twig', 
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            ));
        }

        return $this->render(
            'wswsAppBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
}
 