<?php

namespace Partage\PartageBundle\Controller;

use Partage\PartageBundle\Entity\Objets;
use Partage\PartageBundle\Entity\Association;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('PartagePartageBundle:Accueil:index.html.twig');
    }

    /**
     * @Route("/getobjet/{objet_id}")
     */
    public function recupererObjet($objet_id)
    {
      
    }
}
