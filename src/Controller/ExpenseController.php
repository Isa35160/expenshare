<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;

class ExpenseController extends BaseController
{
    /**
     * @Route("/expense", name="expense")
     */
    public function index()
    {
        return $this->render('expense/index.html.twig', [
            'controller_name' => 'ExpenseController',
        ]);
    }
}