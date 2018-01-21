<?php

namespace FlightsBundle\Controller;

use FlightsBundle\Entity\Airplane;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Airplane controller.
 *
 * @Route("airplane")
 */
class AirplaneController extends Controller
{
    /**
     * Lists all airplane entities.
     *
     * @Route("/", name="airplane_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $airplanes = $em->getRepository('FlightsBundle:Airplane')->findAll();

        return $this->render('airplane/index.html.twig', array(
            'airplanes' => $airplanes,
        ));
    }

    /**
     * Creates a new airplane entity.
     *
     * @Route("/new", name="airplane_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $airplane = new Airplane();
        $form = $this->createForm('FlightsBundle\Form\AirplaneType', $airplane);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airplane);
            $em->flush();

            return $this->redirectToRoute('airplane_index');
        }

        return $this->render('airplane/new.html.twig', array(
            'airplane' => $airplane,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing airplane entity.
     *
     * @Route("/{id}/edit", name="airplane_edit")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction(Request $request, Airplane $airplane)
    {

        $editForm = $this->createForm('FlightsBundle\Form\AirplaneType', $airplane);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('airplane_edit', array('id' => $airplane->getId()));
        }

        return $this->render('airplane/edit.html.twig', array(
            'airplane' => $airplane,
            'edit_form' => $editForm->createView(),

        ));
    }


    /**
     * @Route("/{id}/delete/", name="airplane_delete")
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository('FlightsBundle:Airplane');
        $airplane = $repository->findOneById($id);

        $entityManager=$this->getDoctrine()->getManager();
        $historyRep = $entityManager->getRepository("FlightsBundle:AirplaneHistory");
        $hitoryAll= $historyRep->findByAirplane($airplane);
        foreach ($hitoryAll as $history) {
            $entityManager->remove($history);
        }
        $entityManager->remove($airplane);
        $entityManager->flush();
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Access denied!');
        $url = $this->generateUrl('airplane_index');
        return $this->redirect($url);
    }


}
