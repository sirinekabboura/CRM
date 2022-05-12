<?php

namespace App\Services;
use App\Repository\TournoiRepository;
use  Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tournoi;


class FavorisServices
{
    private $session;
    private $repoTournois;
    public function __construct(SessionInterface $session, TournoiRepository $repoTournois,EntityManagerInterface $manager){
        $this->session = $session;
        $this->repoTournois = $repoTournois;
        $this->manager = $manager;
    }


    public function add(Tournoi $tour){
        $panier = $this->getFavoris();
        $id = $tour->getIdT();

        if(empty($panier[$id])){

            $panier[$id] = 1;
        }

        // On sauvegarde dans la session
        $this->updateFavoris($panier);
    }

    public function removeall(Tournoi $tour){
        $panier = $this->getFavoris();
        $id = $tour->getIdT();

        if(!empty($panier[$id])){
            unset($panier[$id]);



            $this->updateFavoris($panier);
        }

        // On sauvegarde dans la session

    }
    public function getFavoris(){
        return $this->session->get('panier',[]);
    }
    public function updateFavoris($panier){
        $this->session->set('panier', $panier);
        $this->session->set('panierData', $this->getFullFavoris());
    }

    public function removee(Tournoi $tour){
        $panier = $this->getFavoris();
        $id = $tour->getIdT();


        if(!empty($panier[$id])){

            unset($panier[$id]);

            $this->updateFavoris($panier);

        }

        // On sauvegarde dans la session

    }

    public function getFullFavoris(){

        $cart = $this->getFavoris();
        $fullCart = [];


        foreach ($cart as $id => $quantity) {
            $product = $this->repoTournois->find($id);
            if($product){
                //Tournoi récupéré avec succès
                $fullCart['products'][] = [
                    "quantity" => $quantity,
                    "product" => $product
                ];

            }else{
                //identifiant incorrect
            }
        }
        $fullCart['data'] = [

        ];
        return $fullCart;

    }



}
