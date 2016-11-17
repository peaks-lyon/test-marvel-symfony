<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Route("/:page", name="homepage_page")
     */
    public function indexAction(Request $request, $page = 1)
    {
        $api = $this->container->get('api');
        $characters = $api->call('public/characters',['offset' => 100+($page*22), 'limit' => 22]);

        return $this->render('AppBundle::charactersList.html.twig', [
            'characters' => $characters->data->results //['data']['results']
        ]);
    }
}
