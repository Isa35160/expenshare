<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class DebtController extends BaseController
{
    /**
     * @Route("/debt", name="debt")
     */
    public function index()
    {
        return $this->render('debt/index.html.twig', [
            'controller_name' => 'DebtController',
        ]);
    }
}
