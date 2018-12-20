<?php

namespace App\Controller;

use App\Entity\Expense;
use App\Entity\Person;
use App\Entity\ShareGroup;
use App\Form\PersonForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PersonController
 * @package App\Controller
 * @Route("/person")
 */


class PersonController extends BaseController


{
    /**
     * @Route("/group/{slug}", name="person", methods="GET")
     */
    public function index(ShareGroup $shareGroup)
    {
        $persons = $this->getDoctrine()->getRepository(Person::class)
            ->createQueryBuilder('p')
            ->select('p', 'e')
            ->leftjoin('p.expense', 'e')
            ->where('p.shareGroup = :group')
            ->setParameter(':group', $shareGroup->getId())
            ->getQuery()
            ->getArrayResult()
            ;

        return $this->json($persons);
    }

    /**
     * @Route("/", name="person_new", methods="POST")
     */
    public function new(Request $request)
    {
        $data = $request->getContent();

        $jsonData = json_decode($data, true);

        $em = $this->getDoctrine()->getManager();

        $sharegroup = $em->getRepository(ShareGroup::class)->findOneBySlug($jsonData["slug"]);

        $person = new Person();
        $person->setFirstname($jsonData["firstname"]);
        $person->setLastname($jsonData["lastname"]);
        $person->setShareGroup($sharegroup);


        $em->persist($person);
        $em->flush();

        $pers = $this->getDoctrine()->getRepository(Person::class)
            ->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter(':id', $person->getId())
            ->getQuery()
            ->getArrayResult();

        return $this->json($pers[0]);
    }

    /**
     * @Route("/{id}", name="person_delete", methods="DELETE")
     */
    public function delete(Person $person): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($person);
        $em->flush();

        return $this->json(["ok" => true]);
    }
}
