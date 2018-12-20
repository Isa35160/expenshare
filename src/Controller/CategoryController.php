<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\ShareGroup;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class CategoryController
 * @package App\Controller
 * @Route("/category")
 */


class CategoryController extends BaseController
{

    /**
     * @Route("/", name="category", methods="GET")
     */
    public function index()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)
            ->createQueryBuilder('c')
            ->select('c')
            ->getQuery()
            ->getArrayResult()
        ;

        return $this->json($categories);
    }
}
