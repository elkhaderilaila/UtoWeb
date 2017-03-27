<?php

namespace UtopiaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UtopiaBundle\Entity\Temoignage;
use UtopiaBundle\Form\TemoignageType;

/**
 * Temoignage controller.
 *
 * @Route("/admin/temoignage")
 */
class TemoignageController extends Controller
{

    /**
     * Lists all Temoignage entities.
     *
     * @Route("/", name="temoignage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtopiaBundle:Temoignage')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Temoignage entity.
     *
     * @Route("/", name="temoignage_create")
     * @Method("POST")
     * @Template("UtopiaBundle:Temoignage:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Temoignage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('temoignage_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Temoignage entity.
     *
     * @param Temoignage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Temoignage $entity)
    {
        $form = $this->createForm(new TemoignageType(), $entity, array(
            'action' => $this->generateUrl('temoignage_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Temoignage entity.
     *
     * @Route("/new", name="temoignage_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Temoignage();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Temoignage entity.
     *
     * @Route("/{id}", name="temoignage_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtopiaBundle:Temoignage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Temoignage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Temoignage entity.
     *
     * @Route("/{id}/edit", name="temoignage_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtopiaBundle:Temoignage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Temoignage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Temoignage entity.
    *
    * @param Temoignage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Temoignage $entity)
    {
        $form = $this->createForm(new TemoignageType(), $entity, array(
            'action' => $this->generateUrl('temoignage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Temoignage entity.
     *
     * @Route("/{id}", name="temoignage_update")
     * @Method("PUT")
     * @Template("UtopiaBundle:Temoignage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtopiaBundle:Temoignage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Temoignage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('temoignage_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Temoignage entity.
     *
     * @Route("/{id}", name="temoignage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtopiaBundle:Temoignage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Temoignage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('temoignage'));
    }

    /**
     * Creates a form to delete a Temoignage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('temoignage_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
