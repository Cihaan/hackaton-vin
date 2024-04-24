<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReservationController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private ReservationRepository $reservationRepository,
    private UserRepository $userRepository)
    {
    }

    #[Route('/api/confimedReservation', name: 'app_confirmed', methods: ['POST'])]
    public function confirmReservation(Request $request):Response{
        $data = json_decode($request->getContent(), true);
//        dd($data);
        $reservation = $this->reservationRepository->findOneBy(['id' => $data['reservation_id']]);
        $reservation->setConfirmed(true);
        $this->entityManager->persist($reservation);
        $this->entityManager->flush();

        return new Response('Confirmation réussie', Response::HTTP_OK);

    }


}