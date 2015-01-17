<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/tool")
 */
class ToolController extends Controller {

    /**
     * @Route("")
     * @Template()
     */
    public function indexAction() {
        $repo = $this->getDoctrine()->getRepository("AppBundle:Tool");
        $tools = $repo->findAll();

        return array('tools' => $tools);
    }

    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(\Symfony\Component\HttpFoundation\Request $request) {
        $tool = new \AppBundle\Entity\Tool();
        $form = $this->createForm(new \AppBundle\Form\ToolType(), $tool);
        $form->handleRequest($request);

        $user = $this->getUser();
        $tool->setOwner($user);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tool);
            $em->flush();

            return $this->redirect($this->generateUrl("app_tool_index"));
        }

        return array('form' => $form->createView());
    }

}
