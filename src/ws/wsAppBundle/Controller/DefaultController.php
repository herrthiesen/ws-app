<?php

namespace ws\wsAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ws\wsAppBundle\Entity\Partner;
use ws\wsAppBundle\Entity\Links;
use ws\wsAppBundle\Form\AddPartnerForm;
use ws\wsAppBundle\Form\EditPartnerForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

$iP = 0;
$iL = 0;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('wswsAppBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function openAddPartnerFormAction()
    {
        $partner = new Partner();
        $em = $this->getDoctrine()->getManager();
        $em->persist($partner);
        
        $form = $this->createForm(new AddPartnerForm(), $partner);
        
        return $this->render('wswsAppBundle:Default:addPartner.html.twig', array('form' => $form->createView(), $partner));
    }
    
    public function openEditPartnerFormAction($id)
    {
        $repository = $this->getDoctrine()
        ->getRepository('wswsAppBundle:Partner');
        
        //WIR HOLEN UNS DIE DIREKTEN PARTNER
        $query = $repository->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        
        $partner = $query->getSingleResult();
        
        $form = $this->createForm(new EditPartnerForm(), $partner);
        
        return $this->render('wswsAppBundle:Default:editPartner.html.twig', array('form' => $form->createView(), $partner));
    }
    
    public function createPartnerAction(Request $request)
    {
        
        if ('POST' == $request->getMethod())
        {
            $form = $this->createForm(new AddPartnerForm());
            $request = Request::createFromGlobals();
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                $partner = new Partner();
                $partner->setNlId($form->get('nlId')->getData());
                $partner->setNlIdOver($form->get('nlIdOver')->getData());
                $partner->setNick($form->get('nick')->getData());
                $partner->setEmail($form->get('email')->getData());
                $partner->setRegDate($form->get('regDate')->getData());
                $partner->setScrimps($form->get('scrimps')->getData());
                $partner->setQualifiedL($form->get('qualifiedL')->getData());
                $partner->setQualifiedR($form->get('qualifiedR')->getData());
                $partner->setInstallment($form->get('installment')->getData());
                $partner->setType($form->get('type')->getData());
                $partner->setLevel($form->get('level')->getData());
                $partner->setName($form->get('name')->getData());
                $em = $this->getDoctrine()->getManager();
                $em->persist($partner);
                $em->flush();
                /** return new Response('Bühne wurde angelegt mit der ID '.$buehne->getId()); **/
                return $this->redirect($this->generateUrl('wsws_app_addPartner'));
            }
            return new Response('POST gefunden aber Form ungültig ');
        }
        return new Response('Kein POST');
    }
    
    public function updatePartnerAction(Request $request)
    {
        
        
        $form = $this->createForm(new EditPartnerForm());
        $request = Request::createFromGlobals();
        $form->bind($request);
        
        $em = $this->getDoctrine()->getEntityManager();
        $id = $form->get('id')->getData();
        $partner = $em->getRepository('wswsAppBundle:Partner')->find($id);
        if (!$partner) {
          throw $this->createNotFoundException(
                  'No news found for id ' . $id
          );
        }
        
        if ('POST' == $request->getMethod())
        {
            
            if ($form->isValid()) {
                // perform some action, such as save the object to the database
                $partner->setNlId($form->get('nlId')->getData());
                $partner->setNlIdOver($form->get('nlIdOver')->getData());
                $partner->setNick($form->get('nick')->getData());
                $partner->setEmail($form->get('email')->getData());
                $partner->setRegDate($form->get('regDate')->getData());
                $partner->setScrimps($form->get('scrimps')->getData());
                $partner->setQualifiedL($form->get('qualifiedL')->getData());
                $partner->setQualifiedR($form->get('qualifiedR')->getData());
                $partner->setInstallment($form->get('installment')->getData());
                $partner->setType($form->get('type')->getData());
                $partner->setLevel($form->get('level')->getData());
                $partner->setName($form->get('name')->getData());
                $em = $this->getDoctrine()->getManager();
                $em->persist($partner);
                $em->flush();

                return $this->redirect($this->generateUrl('wsws_app_editPartner', array('id' => $id)));
            }
        }
//        if ('POST' == $request->getMethod())
//        {
//            $form = $this->createForm(new EditPartnerForm());
//            $request = Request::createFromGlobals();
//            $form->bindRequest($request);
//            return new Response('POST');
//            
//            if ($form->isValid()) {
//                $em = $this->getDoctrine()->getManager();
//                $id = $form['id']->getData();
//                
//                $repository = $this->getDoctrine()
//                    ->getRepository('wswsAppBundle:Partner');
//
//                $query = $repository->createQueryBuilder('p')
//                    ->where('p.id = :id')
//                    ->setParameter('id', $id)
//                    ->getQuery();
//
//                $partner = $query->getSingleResult();
//                
//                $partner->setNlId($form->get('nlId')->getData());
//                $partner->setNlIdOver($form->get('nlIdOver')->getData());
//                $partner->setNick($form->get('nick')->getData());
//                $partner->setEmail($form->get('email')->getData());
//                $partner->setRegDate($form->get('regDate')->getData());
//                $partner->setScrimps($form->get('scripms')->getData());
//                $partner->setQualifiedL($form->get('qualifiedL')->getData());
//                $partner->setQualifiedR($form->get('qualifiedR')->getData());
//                $partner->setInstallment($form->get('installment')->getData());
//                $partner->setType($form->get('type')->getData());
//                $partner->setLevel($form->get('level')->getData());
//                
//                $em->flush();
//                /** return new Response('Bühne wurde angelegt mit der ID '.$buehne->getId()); **/
//                return $this->redirect($this->generateUrl('wsws_app_editPartner'));
//            }
//            return new Response('POST gefunden aber Form ungültig ');
//        }
        return new Response('Kein POST');
    }
    
    /**
    * @Route("/partner/all/", name="ShowAllPartner")
    * @Security("is_granted('ROLE_ADMIN')")
    * @Template()
    */
    public function showAllPartnersListAction()
    {
        return $this->render('wswsAppBundle:Default:allPartners.html.twig');
    }
    
    
    /**
    *   Return all Partners as button List
    *   
    *   renders default/partnerList.html.twig
    **/
    public function showAllPartnersAction()
    {
//        $repository = $this->getDoctrine()
//        ->getRepository('wswsAppBundle:Partner');
//        
//        
//        $query = $repository->createQueryBuilder('p')
//            ->orderBy('p.level', 'ASC')
//            ->getQuery();
//        
//        $partners = $query->getResult();
//        
//        return $this->render(
//                'default/partnerList.html.twig',
//        array('partners' => $partners));
        
//        $conn = $this->container->get('database_connection');
//        $sql = 'SELECT l.*
//            FROM partner p
//            JOIN Links l ON (p.nlid = l.child)
//            WHERE l.parent = "049.13.01296"
//            ORDER BY l.level';
//        $rows = $conn->query($sql);
//        //echo count($rows);
//        $results = $rows->fetchAll();
//        //echo $results;
//        //print_r($results);
//        foreach ($results as $result)
//        {
//            //print_r($result);   
////            $repository = $this->getDoctrine()
////            ->getRepository('wswsAppBundle:Partner');
////
////            //WIR HOLEN UNS DIE DIREKTEN PARTNER
////            $query = $repository->createQueryBuilder('p')
////                ->where('p.nlId = :id')
////                ->setParameter('id', $result['child'])
////                ->getQuery();
////
////            $partner = $query->getSingleResult();
////            $this->render('default/partnerElement.html.twig', array('partner' => $partner));
//            $this->echoPartner($result);
//            
//        }
        
//        while ($row = $rows->fetch())
//        {       
//            $repository = $this->getDoctrine()
//            ->getRepository('wswsAppBundle:Partner');
//
//            //WIR HOLEN UNS DIE DIREKTEN PARTNER
//            $query = $repository->createQueryBuilder('p')
//                ->where('p.nlId = :id')
//                ->setParameter('id', $row['child'])
//                ->getQuery();
//
//            $partner = $query->getSingleResult();
//            //print_r($partner);
//            //echo ('gefunden '.$partner->getName().' Level '.$partner->getLevel().'<br>');
//            //$this->echoPartnerElementAction($partner);
//            //$this->render('default/partnerElement.html.twig', array('partner' => $partner));
//        }
        //return true;
        $conn = $this->container->get('database_connection');
        $sql = 'SELECT l.*
            FROM partner p
            JOIN Links l ON (p.nlid = l.child)
            WHERE l.parent = "049.13.01296"
            ORDER BY l.level';
        $rows = $conn->query($sql);
        //echo count($rows);
        $results = $rows->fetchAll();
        //echo $results;
        //print_r($results);
        return $this->render('default/partnerNewList.html.twig', array('partners' => $results));
        
    } 
    
    public function echoPartnerAction ()
    {
        $conn = $this->container->get('database_connection');
        $sql = 'SELECT l.*
            FROM partner p
            JOIN Links l ON (p.nlid = l.child)
            WHERE l.parent = "049.13.01296"
            ORDER BY l.level';
        $rows = $conn->query($sql);
        //echo count($rows);
        $results = $rows->fetchAll();
        //echo $results;
        //print_r($results);
        return $this->render('default/partnerNewList.html.twig', array('partners' => $results));
        
//        foreach ($results as $result)
//        {
//            //print_r($result);   
////            $repository = $this->getDoctrine()
////            ->getRepository('wswsAppBundle:Partner');
////
////            //WIR HOLEN UNS DIE DIREKTEN PARTNER
////            $query = $repository->createQueryBuilder('p')
////                ->where('p.nlId = :id')
////                ->setParameter('id', $result['child'])
////                ->getQuery();
////
////            $partner = $query->getSingleResult();
////            $this->render('default/partnerElement.html.twig', array('partner' => $partner));
//            $repository = $this->getDoctrine()
//            ->getRepository('wswsAppBundle:Partner');
//        //print_r($result);
//        //WIR HOLEN UNS DIE DIREKTEN PARTNER
//        $query = $repository->createQueryBuilder('p')
//            ->where('p.nlId = :id')
//            ->setParameter('id', $result['child'])
//            ->getQuery();
//
//        $partner = $query->getSingleResult();
//        echo ('gefunden '.$partner->getName().' Level '.$partner->getLevel().'<br>');
//        //return $this->render('default/partnerElement.html.twig', array('partner' => $partner));
//            
//        }
        
        
        //return true;
    }
    
    public function echoPartnerElementAction($nlID)
    {
        echo 'hier';
         $repository = $this->getDoctrine()
            ->getRepository('wswsAppBundle:Partner');

            //WIR HOLEN UNS DIE DIREKTEN PARTNER
            $query = $repository->createQueryBuilder('p')
                ->where('p.nlId = :id')
                ->setParameter('id', $nlID)
                ->getQuery();

            $partner = $query->getSingleResult();
        //echo ('called '.$partner->getName().'<br>');
        return $this->render('default/partnerElement.html.twig', array('partner' => $partner));
    }
    
    public function createPartnerLinksAction(Request $request, $parent, $nlId, $level)
    {
//        $parent = $request->request->get('parent');
//        $nlId = $request->request->get('child');
        
        echo $parent.' und '.$nlId.'<br>';
        
        $link = new Links();
        
        if ($parent == $nlId)
        {
            $level = 0;
            $link->setParent($parent);
            $link->setChild($nlId);
            $link->setLevel($level);   
            $em = $this->getDoctrine()->getManager();
            $em->persist($link);
            $em->flush();

            return new Response('Link angelegt für: P '.$parent.' C '.$nlId.' L '.$level.'<br>');
        }
        else
        {
            $level = $level+1;
            $link->setParent($parent);
            $link->setChild($nlId);
            $link->setLevel($level);   
            $em = $this->getDoctrine()->getManager();
            $em->persist($link);
            $em->flush();

            echo ('Link angelegt für: P '.$parent.' C '.$nlId.' L '.$level.'<br>');
//            if($parent == '049.13.01296')
//            {
//                return new Response('Oben<br>');
//            }
            $nextParent = $this->getNextParentAction($parent);
            if($nextParent != null)
            {
                $this->createPartnerLinksAction($request, $nextParent, $nlId, $level);
                
            }
            else
            {
                $this->createPartnerLinksAction($request, $nlId, $nlId, $level);
            }
        }
        return new Response('Nix zu tun<br>');
        
    }
    
    public function getNextParentAction($child)
    {
       $conn = $this->container->get('database_connection');
        $sql = 'SELECT parent, child, level
            FROM Links WHERE child = "'.$child.'" AND level = 1';
        $result = $conn->query($sql);

        while ($row = $result->fetch())
        { 
            return $row['parent'];
        }
           
        return null;
    }
    
    
      
    /**
    *   Zählt alle Partner für eine NlID
    *   gibt Response zurück mit Anzahl Partner 
    *   und genutzter Ebenen
    **/
    public function countPartnersForIdAction($nlId)
    {
        global $iP;
        global $iL;
        $repository = $this->getDoctrine()
        ->getRepository('wswsAppBundle:Partner');
        
        
        //WIR HOLEN DIE NL ID VOM PARTNER
        $query = $repository->createQueryBuilder('p')
            ->where('p.nlId = :nlId')
            ->setParameter('nlId', $nlId)
            ->getQuery();
        
        $partner = $query->getSingleResult();
        $nlId = $partner->getNlId();
        
        $iP = 0;
        $iL = 0;
        
        $OnePartners = $this->getNextPartners($nlId);
        
        // LEVEL 1
        
        foreach ($OnePartners as &$OnePartner)
        {
            $iP++;
            if($iL < 1)
                {$iL = 1;}
            $TwoPartners = $this->getNextPartners($OnePartner->getNlId());
        
            // LEVEL 2
            foreach ($TwoPartners as &$TwoPartner)
            {
                $iP++;
                if($iL < 2)
                    {$iL = 2;}      
                $ThreePartners = $this->getNextPartners($TwoPartner->getNlId());
        
                // LEVEL 3
                foreach ($ThreePartners as &$ThreePartner)
                {
                    $iP++;
                    if($iL < 3)
                        {$iL = 3;}
                    $FourPartners = $this->getNextPartners($ThreePartner->getNlId());
        
                    // LEVEL 4
                    foreach ($FourPartners as &$FourPartner)
                    {
                        if($iL < 4)
                            {$iL = 4;}
                        $iP++;
                        $FivePartners = $this->getNextPartners($FourPartner->getNlId());
        
                        // LEVEL 5
                        foreach ($FivePartners as &$FivePartner)
                        {
                            if($iL < 5)
                                {$iL = 5;}
                            $iP++;
                            $SixPartners = $this->getNextPartners($FivePartner->getNlId());
        
                            // LEVEL 6
                            foreach ($SixPartners as &$SixPartner)
                            {
                                if($iL < 6)
                                    {$iL = 6;}
                                $iP++;
                                $SevenPartners = $this->getNextPartners($SixPartner->getNlId());
        
                                // LEVEL 7
                                foreach ($SevenPartners as &$SevenPartner)
                                {
                                    if($iL < 7)
                                        {$iL = 7;}
                                    $iP++;
                                    $EightPartners = $this->getNextPartners($SevenPartner->getNlId());
        
                                    // LEVEL 8
                                    foreach ($EightPartners as &$EightPartner)
                                    {
                                        if($iL < 8)
                                            {$iL = 8;}
                                        $iP++;
                                        $NinePartners = $this->getNextPartners($EightPartner->getNlId());
        
                                        // LEVEL 9
                                        foreach ($NinePartners as &$NinePartner)
                                        {
                                            if($iL < 9)
                                                {$iL = 9;}
                                            $iP++;
                                            $TenPartners = $this->getNextPartners($NinePartner->getNlId());
        
                                            // LEVEL 10
                                            foreach ($TenPartners as &$TenPartner)
                                            {
                                                if($iL < 10)
                                                    {$iL = 10;}
                                                $iP++;
                                                $ElevenPartners = $this->getNextPartners($TenPartner->getNlId());
        
                                                // LEVEL 11
                                                foreach ($ElevenPartners as &$ElevenPartner)
                                                {
                                                    if($iL < 11)
                                                        {$iL = 11;}
                                                    $iP++;
                                                    $TwelfPartners = $this->getNextPartners($ElevenPartner->getNlId());
        
                                                    // LEVEL 12
                                                    foreach ($TwelfPartners as &$TwelfPartner)
                                                    {
                                                        if($iL < 12)
                                                            {$iL = 12;}
                                                        $iP++;
                                                        $ThirteenPartners = $this->getNextPartners($TwelfPartner->getNlId());
        
                                                        // LEVEL 13
                                                        foreach ($ThirteenPartners as &$ThirteenPartner)
                                                        {
                                                            if($iL < 13)
                                                                {$iL = 13;}
                                                            $iP++;
                                                            $FourteenPartners = $this->getNextPartners($ThirteenPartner->getNlId());
        
                                                            // LEVEL 14
                                                            foreach ($FourteenPartners as &$FourteenPartner)
                                                            {
                                                                if($iL < 14)
                                                                    {$iL = 14;}
                                                                $iP++;
                                                                $FivteenPartners = $this->getNextPartners($FourteenPartner->getNlId());
        
                                                                // LEVEL 15
                                                                foreach ($FivteenPartners as &$FivteenPartner)
                                                                {
                                                                    if($iL < 15)
                                                                        {$iL = 15;}
                                                                    $iP++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            //return new Response ($OnePartner->getNlId());
        }
        
        
//        $count = $this->getCountNextPartner($nlId);
//        if($count >= 1)
//        {
//            $i = 1;
//        }
//        
//        do {
//            $nPartner = $this->countRecPartner($nlId);
////            if (count($nPartner > 0)
////            {
////                $iP++;
////                countRecPartner($nPartner->getNlId());
////            }
//        } while (count($nPartner) > 0);
       
        return new Response ('P'.$iP.' E'.$iL);
                
//        if (count($nPartner) == 0)
//        {
//            return new Response ('keine Partner');    
//        }
//        else
//        {
//            $i++;
//            return new Response (count($nPartner).' '.$i);
//        }
//        return new Response('Level '.$i.' Partner '.$count);
    }
    
            
            
    function getNextPartners ($nlId)
    {
        $repository = $this->getDoctrine()
        ->getRepository('wswsAppBundle:Partner');
        
        //WIR HOLEN UNS DIE DIREKTEN PARTNER
        $query = $repository->createQueryBuilder('p')
            ->where('p.nlIdOver = :nlId')
            ->setParameter('nlId', $nlId)
            ->getQuery();
        
        $partner = $query->getResult();
       
        return $partner;
    }
    
    function getCountNextPartner ($nlId)
    {
        $repository = $this->getDoctrine()
        ->getRepository('wswsAppBundle:Partner');
        
        //WIR HOLEN UNS DIE DIREKTEN PARTNER
        $query = $repository->createQueryBuilder('p')
            ->where('p.nlIdOver = :nlId')
            ->setParameter('nlId', $nlId)
            ->getQuery();
        
        $partner = $query->getResult();
        $count = count($partner);
        return $count;
    }
    
}
