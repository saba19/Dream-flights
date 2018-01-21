<?php

namespace FlightsBundle\Controller;

use FlightsBundle\Entity\AirplaneHistory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
/**
 * Airplanehistory controller.
 *
 * @Route("airplanehistory")
 */
class AirplaneHistoryController extends Controller
{
    /**
     * Lists all airplaneHistory entities.
     *
     * @Route("/", name="airplanehistory_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $airplaneHistories = $em->getRepository('FlightsBundle:AirplaneHistory')->findAll();

        return $this->render('airplanehistory/index.html.twig', array(
            'airplaneHistories' => $airplaneHistories,
        ));
    }

    /**
     * Creates a new airplaneHistory entity.
     *
     * @Route("/new", name="airplanehistory_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $airplaneHistory = new Airplanehistory();
        $form = $this->createForm('FlightsBundle\Form\AirplaneHistoryType', $airplaneHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airplaneHistory);
            $em->flush();

            return $this->redirectToRoute('airplanehistory_index', array('id' => $airplaneHistory->getId()));
        }

        return $this->render('airplanehistory/new.html.twig', array(
            'airplaneHistory' => $airplaneHistory,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing airplaneHistory entity.
     *
     * @Route("/{id}/edit", name="airplanehistory_edit")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction(Request $request, AirplaneHistory $airplaneHistory)
    {
        $editForm = $this->createForm('FlightsBundle\Form\AirplaneHistoryType', $airplaneHistory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('airplanehistory_edit', array('id' => $airplaneHistory->getId()));
        }

        return $this->render('airplanehistory/edit.html.twig', array(
            'airplaneHistory' => $airplaneHistory,
            'edit_form' => $editForm->createView(),
        ));
    }



    /**
     * @Route("/{id}/delete/", name="airplanehistory_delete")
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository('FlightsBundle:AirplaneHistory');
        $usersToDelete = $repository->findOneById($id);
        $entityManager->remove($usersToDelete);
        $entityManager->flush();
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Access denied!');
        $url = $this->generateUrl('airplanehistory_index');
        return $this->redirect($url);
    }



}
