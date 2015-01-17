<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/loan")
 */
class LoanController extends Controller {

    /**
     * @Route("")
     * @Template()
     */
    public function indexAction() {
        $repo = $this->getDoctrine()->getRepository("AppBundle:Loan");

        $loans = $repo->findAllByBorrower($this->getUser());

        return array('loans' => $loans);
    }

    /**
     * @Route("/add/{id}")
     * @Template()
     * @ParamConverter("tool", class="AppBundle:Tool")
     */
    public function addAction(\Symfony\Component\HttpFoundation\Request $request, \AppBundle\Entity\Tool $tool) {
        $loan = new \AppBundle\Entity\Loan();
        $form = $this->createForm(new \AppBundle\Form\LoanType(), $loan);
        $form->handleRequest($request);

        $user = $this->getUser();
        $loan->setBorrower($user);
        $loan->setTool($tool);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($loan);
            $em->flush();

            return $this->redirect($this->generateUrl("app_loan_index"));
        }

        return array('form' => $form->createView());
    }

}
