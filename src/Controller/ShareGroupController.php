<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class ShareGroupController extends BaseController
{
    /**
     * @Route("/share/group", name="share_group")
     */
    public function index()
    {
        return $this->render('share_group/index.html.twig', [
            'controller_name' => 'ShareGroupController',
        ]);
    }
}
