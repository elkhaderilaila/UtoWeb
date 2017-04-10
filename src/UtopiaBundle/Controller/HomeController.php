<?php


namespace UtopiaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * home controller.
 *
 * @Route("/")
 */

class HomeController extends Controller
{

    /**
     * index.
     *
     * @Route("/", name="home")
     * @Method("GET")
     * @Template("UtopiaBundle:Home:index.html.twig")
     */
    public function indexAction()
    {

    }


}