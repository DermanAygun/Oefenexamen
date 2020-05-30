<?php

namespace App\Controller;

use App\Entity\Kamer;
use App\Entity\Reservering;
use App\Form\BoekenType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/boeken", name="boeken")
     */
    public function boeken(Request $request): Response
    {
        $form = $this->createForm(BoekenType::class);
        $form->handleRequest($request);

        $formData = $form->getData();

        $repo = $this->getDoctrine();
        $kamers = $repo->getRepository(Kamer::class)->findAll();
        $reserveringen = $repo->getRepository(Reservering::class)->findAll();

        if ($form->isSubmitted() && $form->isValid()) {

            $incheck = $formData["Incheck"];
            $uitcheck = $formData["Uitcheck"];
            $personen = $formData["Personen"];

            return $this->render('default/rooms.html.twig', [
                'controller_name' => 'DefaultController',
                'reserveringen' => $reserveringen,
                'kamers' => $kamers,
                'incheck' => $incheck,
                'uitcheck' => $uitcheck,
                'personen' => $personen,
            ]);
        }

        return $this->render('default/boeken.html.twig', [
            'controller_name' => 'DefaultController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/boeken/{id}", name="boek_kamer", methods={"GET"})
     */
    public function boek_kamer($id, Request $request): Response
    {
        $repo = $this->getDoctrine();
        $kamer = $repo->getRepository(Kamer::class)->find($id);

        $form = $this->createForm(BoekenType::class);
        $form->handleRequest($request);

        $formData = $form->getData();

        return $this->render('default/boek_kamer.html.twig', [
            'controller_name' => 'DefaultController',
            'kamer' => $kamer,
            'form' => $form->createView(),
        ]);
    }

}
