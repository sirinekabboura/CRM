<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Poule;
use App\Entity\Tournoi;
use App\Form\SearchForm;
use App\Form\TournoiType;
use App\Repository\TournoiRepository;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\GeoChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\QrcodeService;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\Json;




class GameController extends AbstractController
{
    const  ATTRIBUTES_TO_SERIALIZE = ['nomT', 'emplacementT', 'dateT'];
    /**
     * @Route("/game", name="app_game")
     */
    public function index(): Response
    {
        return $this->render('game/SecondInterfaceADJOIN.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @Route("/gameback", name="appgameback")
     */
    public function indexback(): Response
    {
        $Tournoi = $this->getDoctrine()->getManager()->getRepository(Tournoi::class)->findAll();
        return $this->render('game/gameback.html.twig', [
            'T'=>$Tournoi
        ]);
    }

    /**
     * @Route("/AddGameBack", name="AddGameBack")
     */
    public function AddGameB(\Symfony\Component\HttpFoundation\Request $request): Response
    {
        $Tournoi = new Tournoi();
        $form = $this->createForm(TournoiType::class, $Tournoi);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isvalid()) {
        $em= $this->getDoctrine()->getManager();
        $em->persist($Tournoi);  // Add
        $em->flush();
        return $this->redirectToRoute('appgameback');
        }
        return $this->render('game/CreateGameB.html.twig',['f'=>$form->createView()]);
    }

    /**
     * @Route("/RemoveGameB/{id_t}", name="RemoveGameBack")
     */
    public function RemoveGameB(Tournoi $Tournoi): Response
    {
        $em= $this->getDoctrine()->getManager();
        $em->remove($Tournoi);
        $em->flush();
        return $this->redirectToRoute('appgameback');
    }
    /**
     * @Route("/ModifyGameB/{id_t}", name="ModifyGameBack")
     */
    public function ModifyGameB(\Symfony\Component\HttpFoundation\Request $request , $id_t): Response
    {
        $Tournoi =$this->getDoctrine()->getManager()->getRepository(Tournoi::class)->find($id_t);
        $form = $this->createForm(TournoiType::class, $Tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isvalid()) {
            $em= $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('appgameback');
        }
        return $this->render('game/ModifyGameB.html.twig',['f'=>$form->createView()]);
    }

/** Code FRONTT  */



    /**
     * @Route("/gameFChoose", name="app_gameFChoose")
     */
    public function indexChooseS(): Response
    {
        return $this->render('game/SecondInterfaceADJOIN.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @Route("/gameFListJoin", name="app_gameFJoin")
     */
    public function indexJoin(TournoiRepository $tour , \Symfony\Component\HttpFoundation\Request $request)
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class , $data);
        $form->handleRequest($request);
        $Tournoi = $this->getDoctrine()->getManager()->getRepository(Tournoi::class)->findAll();
        $Tournoii = $tour->listProduitByCat($data);
        return $this->render('game/index.html.twig', [
            'T'=>$Tournoi,
            'TT'=>$Tournoii,
            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route("/gameFListJoinInterface", name="app_gameFJoinInterface")
     */
    public function indexJoinInterface(): Response
    {

        $Tournoi = $this->getDoctrine()->getManager()->getRepository(Tournoi::class)->findAll();
        return $this->render('game/TournamentExistInterface.html.twig', [
            'T'=>$Tournoi
        ]);
    }
    
    /**
     * @Route("/gameFront", name="app_gameFront")
     */
    public function indexfront(): Response
    {
        $Tournoi = $this->getDoctrine()->getManager()->getRepository(Tournoi::class)->findAll();
        return $this->render('game/gameFront.html.twig', [
            'T'=>$Tournoi
        ]);
    }


    /**
     * @Route("/AddGameF", name="AddGameFront")
     */
    public function AddGameF(\Symfony\Component\HttpFoundation\Request $request): Response
    {
        $Tournoi = new Tournoi();
        $form = $this->createForm(TournoiType::class, $Tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isvalid()) {
            $em= $this->getDoctrine()->getManager();
            $em->persist($Tournoi);  // Add
            $em->flush();
            return $this->redirectToRoute('app_gameFJoin');
        }
        return $this->render('game/CreateGameF.html.twig',['f'=>$form->createView()]);
    }



    /**
     * @Route("/RemoveGameF/{id_t}", name="RemoveGameFront")
     */
    public function RemoveGameF(Tournoi $Tournoi): Response
    {
        $em= $this->getDoctrine()->getManager();
        $em->remove($Tournoi);  // Add
        $em->flush();
        return $this->redirectToRoute('app_gameFront');
    }

    /**
     * @Route("/ModifyGameF/{id_t}", name="ModifyGameFront")
     */
    public function ModifyGameF(\Symfony\Component\HttpFoundation\Request $request , $id_t): Response
    {
        $Tournoi =$this->getDoctrine()->getManager()->getRepository(Tournoi::class)->find($id_t);
        $form = $this->createForm(TournoiType::class, $Tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isvalid()) {
            $em= $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('app_gameFJoin');
        }
        return $this->render('game/ModifyGameFm.html.twig',['f'=>$form->createView()]);
    }
    /**
     * @Route("/ModifyGameFF/{nomT}", name="ModifyGameFrontt")
     */
    public function ModifyGameFront(\Symfony\Component\HttpFoundation\Request $request, $nomT): Response
    {
        $Tournoi =$this->getDoctrine()->getManager()->getRepository(Tournoi::class)->find($nomT);
        $form = $this->createForm(TournoiType::class, $Tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isvalid()) {
            $em= $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('app_gameFJoin');
        }
        return $this->render('game/ModifyGameF.html.twig',['f'=>$form->createView()]);
    }

    /**
     * @Route("/RemoveGameFF/{nomT}", name="RemoveGameFrontt")
     */
    public function RemoveGameFront(Tournoi $Tournoi): Response
    {
        $em= $this->getDoctrine()->getManager();
        $em->remove($Tournoi);
        $em->flush();
        return $this->redirectToRoute('app_gameFJoin');
    }
                                                                        //------------- Calendar
    /**
     * @Route("/calender", name="calender")
     */

    public function viewcal()
    {
        $list = $this->getDoctrine()->getRepository(Tournoi::class)->findAll();

        $res = [] ;
        foreach ($list as $x)
        {
            $res[] = [
                //'id'=> $x->getId(),
                'title'=>$x->getNomT(),
                //'Client'=>$x->getClient()->getName() ,
                'start'=>$x->getDateT()->format('Y-m-d'),
                'end'=>$x->getDateT()->format('Y-m-d'),
            ] ;

        }

        $data = json_encode($res);

        return $this->render('game/calendar.html.twig', compact('data'));
    }

    // afficher Tournois front

    /**
     * @Route("/afficherEF", name="afficherEF")
     */
    public function afficherEF(QrcodeService $service)
    {
        $qrcode=$service->qrcode("Hello choose whatever you want , Enjoy !");

        $reader=$this->getDoctrine()->getRepository(Tournoi:: class)->findAll();
        return $this->render('game/TournamentExistInterface.html.twig', array(
            'reader'=>$reader,'qr'=>$qrcode
        ));

    }

                                                                        /// -------------Maps

    /**
     * @Route("/Maps", name="Maps")
     *  @return \Symfony\Component\HttpFoundation\Response
     */
    public function Stats(TournoiRepository $T):Response
    {
        $data = $T->findAll();
        $dest = array();
        foreach ($data as $x) {
            //$dest[] = [$x->getDestination()] ;
            array_push($dest, $x->getEmplacementT());
        }


        $GeoChart = new GeoChart();
        $array_dest_occ = array_count_values($dest);
        $final = [
            ['Name ', 'Number of Tournament']

        ];
        foreach ($array_dest_occ as $x => $x_value) {
            $final[] = [$x, (int)$x_value];
        }


        $GeoChart->getData()->setArrayToDataTable( $final);
        $GeoChart->getOptions()->setHeight(350);
        $GeoChart->getOptions()->setWidth(700);


        //dump($data); die();

        return $this->render('game/Maps.html.twig',  [
                'controller_name' => 'GameController','Geochart' => $GeoChart]
        );

    }


    //////////////////////////////////////////////////////////// Mobile //////////////////////////////


    /**
     * @Route("/AddM" , name="AddM" ,  methods={"GET", "POST"}, requirements={"id":"\d+"})
     */
    public function ajouterM(Request $request,SerializerInterface $serializer)
    {

        $Tournoi = new Tournoi();
        $nomT=$request->query->get('nom_t');
        $emplacementT=$request->query->get('emplacement_t');
        $date = new \DateTime('now');
        $em=$this->getDoctrine()->getManager();
        $Tournoi->setNomT($nomT);
        $Tournoi->setEmplacementT($emplacementT);
        $Tournoi->setDateT($date);

        $em->persist($Tournoi);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($Tournoi);
        return new JsonResponse($formatted);
    }


    /**
     * @Route("/DisplayM" , name="DisplayM" )
     * @return JsonResponse
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function DisplayAll()
    {
        $Tournoi = $this->getDoctrine()->getManager()->getRepository(Tournoi::class)->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted =$serializer->normalize($Tournoi,'json',['groups'=>'post:read']);
        return new JsonResponse($formatted);
    }




    /**
     * @Route("/DeleteMF", name="delete_M")
     * @Method("DELETE")
     */

    public function DeleteM(Request $request): JsonResponse
    {
        $id = $request->get("id_t");

        $em = $this->getDoctrine()->getManager();
        $Tournois = $em->getRepository(Tournoi::class)->find($id);
        if($Tournois!=null ) {
            $em->remove($Tournois);
            $em->flush();

            $serialize = new Serializer([new ObjectNormalizer()]);
            $formatted = $serialize->normalize("Tournois a ete supprimee avec success.");
            return new JsonResponse($formatted);

        }
        return new JsonResponse("id Tournois invalide.");


    }


    /******************Modifier Tournois *****************************************/
    /**
     * @Route("/updateTournois", name="update_Tournois")
     * @Method("PUT")
     */
    public function modifierTournoisAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $Tournois = $this->getDoctrine()->getManager()
            ->getRepository(Tournoi::class)
            ->find($request->get("id_t"));

        $Tournois->setNomT($request->get("nom_t"));
        $Tournois->setEmplacementT($request->get("emplacement_t"));
        //$Tournois->setDateT($request->get("date_t"));


        $em->persist($Tournois);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Tournois);
        return new JsonResponse("Tournois a ete modifiée avec success.");

    }


    /******************Detail Tournament*****************************************/

    /**
     * @Route("/detailTournament", name="detail_Tournament")
     * @Method("GET")
     */

    public function DetailTournament(Request $request)
    {
        $id = $request->get("id_t");

        $em = $this->getDoctrine()->getManager();
        $reclamation = $this->getDoctrine()->getManager()->getRepository(Tournoi::class)->find($id);
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getDescription();
        });
        $serializer = new Serializer([$normalizer], [$encoder]);
        $formatted = $serializer->normalize($reclamation);
        return new JsonResponse($formatted);
    }






}
