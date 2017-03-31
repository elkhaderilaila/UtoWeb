<?php

namespace UtopiaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UtopiaBundle\Entity\Metier;
use UtopiaBundle\Form\MetierType;

/**
 * Metier controller.
 *
 * @Route("/admin/metier")
 */
class MetierController extends Controller
{

    /**
     * Lists all Metier entities.
     *
     * @Route("/", name="metier")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtopiaBundle:Metier')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Metier entity.
     *
     * @Route("/", name="metier_create")
     * @Method("POST")
     * @Template("UtopiaBundle:Metier:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Metier();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('metier_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Metier entity.
     *
     * @param Metier $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Metier $entity)
    {
        $form = $this->createForm(new MetierType(), $entity, array(
            'action' => $this->generateUrl('metier_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Metier entity.
     *
     * @Route("/new", name="metier_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Metier();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Metier entity.
     *
     * @Route("/{id}", name="metier_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtopiaBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Metier entity.
     *
     * @Route("/{id}/edit", name="metier_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtopiaBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Metier entity.
    *
    * @param Metier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Metier $entity)
    {
        $form = $this->createForm(new MetierType(), $entity, array(
            'action' => $this->generateUrl('metier_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Metier entity.
     *
     * @Route("/{id}", name="metier_update")
     * @Method("PUT")
     * @Template("UtopiaBundle:Metier:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtopiaBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('metier_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Metier entity.
     *
     * @Route("/{id}", name="metier_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtopiaBundle:Metier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Metier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('metier'));
    }

    /**
     * Creates a form to delete a Metier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('metier_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('supprimer', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
