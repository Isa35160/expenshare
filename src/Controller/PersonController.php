<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class DefaultController
 * @package App\Controller
 */


class PersonController extends BaseController


{
    /**
     * @Route("/person", name="person")
     */
    public function index()
    {
        return $this->render('person/index.html.twig', [
            'controller_name' => 'PersonController',
        ]);
    }

    /**
     * @Route("/new", name="person_new", methods="POST")
     */
    public function new(Request $request)

    {
        $person = new Person();

        $form = $this->createForm(PersonFrom::class, $person);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            if ($request->isXmlHttpRequest()) {
                return $this->json($person);
            }

//            return $this->redirectToRoute('homepage');
        }

//        return $this->render('author/new.html.twig', ['form' =>$form->createView()]);
    }
}
