<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/comment")
 */
class CommentController extends Controller {

    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction() {
        return array(
            // ...
        );
    }

}
