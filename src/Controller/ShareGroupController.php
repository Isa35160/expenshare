<?php

namespace App\Controller;

use App\Entity\ShareGroup;
use App\Form\ShareGroupFrom;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ShareGroupController
 * @package App\Controller
 * @Route("/share_group")
 */

class ShareGroupController extends BaseController
{

    /**
     * @Route("/", name="share_group_list", methods="GET")
     */
    public function index(Request $request)
    {
        $sharegroups = $this->getDoctrine()->getRepository(ShareGroup::class)
            ->createQueryBuilder('s')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($sharegroups);
        }

    }


    /**
     * @Route("/", name="share_group")
     */
    public function show()
    {
//        return $this->render('share_group/index.html.twig', [
//            'controller_name' => 'ShareGroupController',
//        ]);
    }

    /**
     * @Route("/new", name="share_group_new", methods="POST")
     */
    public function new(Request $request)

    {
        $sharegroup = new ShareGroup();

        $form = $this->createForm(ShareGroupFrom::class, $sharegroup);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sharegroup);
            $em->flush();

            if ($request->isXmlHttpRequest()) {
                return $this->json($sharegroup);
            }

//            return $this->redirectToRoute('homepage');
        }

//        return $this->render('author/new.html.twig', ['form' =>$form->createView()]);
    }


}
