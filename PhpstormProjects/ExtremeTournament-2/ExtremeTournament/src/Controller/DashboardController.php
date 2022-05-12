<?php

namespace App\Controller;

use App\Repository\TournoiRepository;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\GeoChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }

    /**
     * @Route("/admin/user", name="afficheuser")
     */
    public function affiche(): Response
    {
        //$rep = $this->getDoctrine()->getRepository(User::class);
        //$users = $rep->findAll();
        return $this->render('dashboard/afficheuser.html.twig');
    }

                                                             ///// ------------------ PIECHART
    /**
     * @Route("/admin", name="app_admin")
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

        $pieChart = new PieChart();
        $array_dest_occ = array_count_values($dest);
        $final = [
            ['Name ', 'Location']

        ];
        foreach ($array_dest_occ as $x => $x_value) {
            $final[] = [$x, (int)$x_value];
        }


        $pieChart->getData()->setArrayToDataTable( $final);

        $pieChart->getOptions()->setTitle('Tournois en Fonction des Emplacement');
        $pieChart->getOptions()->setHeight(360);
        $pieChart->getOptions()->setWidth(510);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#07600');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(15);

        $data = $T->findAll();
        $dest = array();
        foreach ($data as $x) {
            //$dest[] = [$x->getDestination()] ;
            array_push($dest, $x->getEmplacementT());
        }

        $GeoChart = new GeoChart();
        $array_dest_occ = array_count_values($dest);
        $final = [
            ['Name ', 'Location']

        ];
        foreach ($array_dest_occ as $x => $x_value) {
            $final[] = [$x, (int)$x_value];
        }


        $GeoChart->getData()->setArrayToDataTable( $final);

        $GeoChart->getOptions()->setHeight(360);
        $GeoChart->getOptions()->setWidth(510);


        //dump($data); die();

        return $this->render('dashboard/index.html.twig',  [
                'controller_name' => 'GameController','piechart' => $pieChart ,'Geochart' => $GeoChart]
        );

    }



}
