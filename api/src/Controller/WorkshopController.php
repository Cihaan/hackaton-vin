<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use App\Repository\WorkshopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Uuid;

class WorkshopController extends AbstractController
{
    public function __construct(private WorkshopRepository $workshopRepository,
                                private EntityManagerInterface $entityManager, private UserRepository $userRepository,
    private ReservationRepository $reservationRepository)
    {
    }

    #[Route('/api/inscription', name: 'app_inscription', methods: ['POST'])]
    public function inscription(Request $request, MailerInterface $mailer): Response
    {
        $data = json_decode($request->getContent(), true);
//        dd($data['id_workshop'], $data['email']);
        $workshop = $this->workshopRepository->findOneBy(['id' => $data['id_workshop']]);
        $drinker = $this->userRepository->findOneBy(['email' => $data['email']]);

        if ($drinker == null) {
            $drinker = new User();
            $drinker->setEmail($data['email']);
            $drinker->setPassword('');
            $drinker->setRoles(['ROLE_USER']);
        }
//        dd($workshop->getDrinkers()->toArray());
//        dd($this->reservationRepository->findBy(['drinker'=>$drinker->getId(), 'workshop'=>$workshop->getId()]));
        if($this->reservationRepository->findBy(['drinker'=>$drinker->getId(), 'workshop'=>$workshop->getId()]) == []){
            $reservation = new Reservation();
            $reservation->setConfirmed(false);
            $reservation->setDrinker($drinker);
            $reservation->setWorkshop($workshop);
        }
        else{
            return new Response('error', Response::HTTP_FORBIDDEN);
        }
//        $drinkers = $workshop->getDrinkers();
//        array_push($drinkers, $data['email']);
//        $workshop->setDrinkers($drinkers);
        $this->entityManager->persist($workshop);

        $this->entityManager->persist($drinker);
        $this->entityManager->persist($reservation);
//        dd($workshop, $reservation, $drinker);
        $this->entityManager->flush();

        $email = (new Email())
            ->from('association@duVin.com')
            ->to($data['email'])
            ->subject('Inscription ateliers')
            ->text('Inscription ateliers')
            ->html('Inscription ateliers -> mdp: ' . $workshop->getPassword());

        $mailer->send($email);
        return new Response('Inscription réussie', Response::HTTP_OK);
    }


}