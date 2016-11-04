<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $api = $this->container->get('api');
        $characters = $api->call('public/characters',['offset' => 100, 'limit' => 22]);

        return $this->render('AppBundle::charactersList.html.twig', [
            'characters' => $characters->data->results //['data']['results']
        ]);
    }
}
