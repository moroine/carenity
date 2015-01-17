<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller {

    /**
     * @Route("", name="homepage")
     * @Template()
     */
    public function indexAction() {

        return array();
    }

}
