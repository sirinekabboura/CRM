<?php

namespace App\Controller;

use App\Entity\Poule;
use App\Form\PouleType;
use App\Repository\PouleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PouleController extends AbstractController
{
    /**
     * @Route("/poule", name="app_poule")
     */
    public function index(): Response
    {
        return $this->render('poule/index.html.twig', [
            'controller_name' => 'PouleController',
        ]);

    }

    /**
     * @Route("/pouleback", name="app_pouleback")
     */
    public function indexback(): Response
    {
        $Poule = $this->getDoctrine()->getManager()->getRepository(Poule::class)->findAll();

        return $this->render('poule/pouleback.html.twig', [
           'P'=>$Poule
        ]);
    }

    /**
     * @Route("/AddPouleB", name="AddPouleB")
     */
    public function AddPouleB(Request $request): Response
    {
        $poule = new Poule();
        $form = $this->createForm(PouleType::class, $poule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isvalid()) {
            $em= $this->getDoctrine()->getManager();
            $em->persist($poule);  // Add
            $em->flush();
            return $this->redirectToRoute('app_pouleback');
        }
        return $this->render('poule/CreatePouleB.html.twig',['f'=>$form->createView()]);
    }

    /**
     * @Route("/RemovePoule/{nom_poule}", name="RemovePoule")
     */
    public function RemovePouleB(Poule $poule): Response
    {
        $em= $this->getDoctrine()->getManager();
        $em->remove($poule);
        $em->flush();
        return $this->redirectToRoute('app_pouleback');
    }
    /**
     * @Route("/ModifyPoule/{nom_poule}", name="ModifyPoule")
     */
    public function ModifyPoule(\Symfony\Component\HttpFoundation\Request $request , $nom_poule): Response
    {
        $Poule =$this->getDoctrine()->getManager()->getRepository(Poule::class)->find($nom_poule);
        $form = $this->createForm(PouleType::class, $Poule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isvalid()) {
            $em= $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('app_pouleback');
        }
        return $this->render('Poule/ModifyPoule.html.twig',['f'=>$form->createView()]);
    }


}
