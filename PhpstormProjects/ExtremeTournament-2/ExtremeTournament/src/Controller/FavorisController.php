<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tournoi;
use App\Services\FavorisServices;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class FavorisController extends AbstractController
{
    /**
     * @Route("/favoris", name="app_favoris")
     */
    public function index(FavorisServices $cartServices): Response
    {

        $panier = $cartServices->getFullFavoris();

        // On "fabrique" les données

        return $this->render('favoris/index.html.twig',['dataPanier'=>$panier]);

    }
    /**
     * @Route("/addf/{id_t}", name="addf")
     */
    public function add(Tournoi $tour,FavorisServices $cartServices)
    {
        // On récupère le panier actuel

        $cartServices->add($tour);
        return $this->redirectToRoute("app_favoris");
    }
    /**
     * @Route("/removef/{id_t}", name="removef")
     */
    public function removee(Tournoi $tour,FavorisServices $cartServices )
    {
        // On récupère le panier actuel
        $cartServices->removee($tour);
        return $this->redirectToRoute("app_favoris");
    }
    /**
     * @Route("/deletef/{id_t}", name="deletef")
     */
    public function delete(Tournoi $tour,FavorisServices $cartServices)
    {
        // On récupère le panier actuel
        $cartServices->removeall($tour);
        return $this->redirectToRoute("app_favoris");
    }


}
