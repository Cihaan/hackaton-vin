<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class ReservationController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private ReservationRepository $reservationRepository,
    private UserRepository $userRepository, private MailerInterface $mailer)
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

        $email = (new Email())
            ->from('association@duVin.com')
            ->to($reservation->getDrinker()->getEmail())
            ->subject('Inscription à l\'atelier '. $reservation->getWorkshop()->getName())
            ->text("Inscription à l'ateliers ". $reservation->getWorkshop()->getName() . ". Le mot de passe pour y accéder est: " . $reservation->getWorkshop()->getPassword() .
                " l'atelier aura lieu le : " . $reservation->getWorkshop()->getDate()->format('fr') )
            ->html("Inscription à l'ateliers ". $reservation->getWorkshop()->getName() . ". <br> Le mot de passe pour y accéder est: " . $reservation->getWorkshop()->getPassword() .
                "<br> l'atelier aura lieu le : " . $reservation->getWorkshop()->getDate()->format('fr') );

        try {
            $this->mailer->send($email);
        }catch (TransportExceptionInterface $e) {
            dd($e);
        }

        return new Response('Confirmation réussie', Response::HTTP_OK);

    }


}