<?php

namespace App\Controller;

use App\Entity\Expense;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ExpenseController
 * @package App\Controller
 * @Route("/expense")
 */

class ExpenseController extends BaseController
{

    /**
     * @Route("/", name="expense_list", methods="GET")
     */
    public function index(Request $request):Response{
        $expenses = $this->getDoctrine()->getRepository(Expense::class)
            ->createQueryBuilder('e')
            ->select('e', 'c')
            ->join('e.category', 'c')
            ->getQuery()
            ->getArrayResult();

        if($request->isXmlHttpRequest()) {
            return $this->json($expenses);
        } else {

        }
    }

    /**
     * @Route("/show", name="expense")
     */
    public function show()
    {
        return $this->render('expense/index.html.twig', [
            'controller_name' => 'ExpenseController',
        ]);
    }
}
