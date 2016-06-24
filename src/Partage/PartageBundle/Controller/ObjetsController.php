<?php

namespace Partage\PartageBundle\Controller;

use Partage\PartageBundle\Entity\Particulier;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Partage\PartageBundle\Entity\Objets;
use Partage\PartageBundle\Form\ObjetsType;

/**
 * Objets controller.
 *
 * @Route("/objets")
 */
class ObjetsController extends Controller
{
    /**
     * Lists all Objets entities.
     *
     * @Route("/", name="objets_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $objets = $em->getRepository('PartagePartageBundle:Objets')->findAll();

        $this->denyAccessUnlessGranted(['ROLE_ADMIN', 'ROLE_ASSOS'], null,
            'Interdit :)) 
        :)) 
        :)');
        return $this->render(
            'objets/index.html.twig',
            array(
                'objets' => $objets,
            )
        );
    }

    /**
     * Creates a new Objets entity.
     *
     * @Route("/new", name="objets_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $userParticulier = $this->getUser();
        $particulier = $userParticulier->getParticulier();

        $objet = new Objets();
        $objet->setParticulier($particulier);

        $form = $this->createForm(
            'Partage\PartageBundle\Form\ObjetsType',
            $objet
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            return $this->redirectToRoute(
                'objets_show',
                array('id' => $objet->getParticulier()->getId())
            );
        }

        return $this->render(
            'objets/new.html.twig',
            array(
                'objet' => $objet,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Objets entity.
     *
     * @Route("/{id}", name="objets_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager()->getRepository
        (
            'PartagePartageBundle:Objets'
        );
        $particulierObjet = $em->findBy(['particulier' => $id]);

        return $this->render(
            'objets/show.html.twig',
            array(
                'particulierObjet' => $particulierObjet,
            )
        );
    }

    /**
     * Displays a form to edit an existing Objets entity.
     *
     * @Route("/{id}/edit", name="objets_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Objets $objet)
    {
        $deleteForm = $this->createDeleteForm($objet);
        $editForm = $this->createForm(
            'Partage\PartageBundle\Form\ObjetsType',
            $objet
        );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            return $this->redirectToRoute(
                'objets_edit',
                array('id' => $objet->getId())
            );
        }

        return $this->render(
            'objets/edit.html.twig',
            array(
                'objet' => $objet,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Objets entity.
     *
     * @Route("/{id}", name="objets_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Objets $objet)
    {
        $form = $this->createDeleteForm($objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($objet);
            $em->flush();
        }

        return $this->redirectToRoute(
            'objets_show',
            array('id' => $objet->getParticulier()->getId())
        );
    }

    /**
     * Creates a form to delete a Objets entity.
     *
     * @param Objets $objet The Objets entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Objets $objet)
    {
        return $this->createFormBuilder()
            ->setAction(
                $this->generateUrl(
                    'objets_delete',
                    array('id' => $objet->getId())
                )
            )
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @Route("/getobjet/{id}", name="get_objet")
     */
    public function getAction($id)
    {
        $user = $this->getUser();
        $user_id = $user->getAssociation();

        $getObjetFromDatabase = $this->getDoctrine()->getManager()->getRepository('PartagePartageBundle:Objets');
        $objetOfDatabase = $getObjetFromDatabase->find($id);
        $objetOfDatabase->addAssociation($user_id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($objetOfDatabase);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/showrequest/", name="show_request")
     */
    public function showRequestAction()
    {
        $user = $this->getUser();
        $user_id = $user->getId();

        $em = $this->getDoctrine()->getManager()->getRepository('PartagePartageBundle:Objets');
        $queryObjet = $em->findBy(array('particulier' => $user_id));

        return $this->render('objets/showObjet.html.twig', array(
            'queryObjet' => $queryObjet,
        ));
    }
}
