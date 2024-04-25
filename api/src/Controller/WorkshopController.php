<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use App\Repository\WorkshopRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
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
        $workshop = $this->workshopRepository->findOneBy(['id' => $data['id_workshop']]);
        $drinker = $this->userRepository->findOneBy(['email' => $data['email']]);
        if ($workshop->getReservations()->count() >= $workshop->getLimitDrinker()){
            return new Response('error', Response::HTTP_FORBIDDEN);
        }
        if ($drinker == null) {
            $drinker = new User();
            $drinker->setEmail($data['email']);
            $drinker->setPassword('');
            $drinker->setRoles(['ROLE_USER']);
        }
        if($this->reservationRepository->findBy(['drinker'=>$drinker->getId(), 'workshop'=>$workshop->getId()]) == []){
            $reservation = new Reservation();
            $reservation->setConfirmed(false);
            $reservation->setDrinker($drinker);
            $reservation->setWorkshop($workshop);
        }
        else{
            return new Response('error', Response::HTTP_FORBIDDEN);
        }

        $this->entityManager->persist($workshop);
        $this->entityManager->persist($drinker);
        $this->entityManager->persist($reservation);

        $this->entityManager->flush();

        $email = (new Email())
            ->from('association@duVin.com')
            ->to($data['email'])
            ->subject('Inscription à l\'atelier '. $workshop->getName())
            ->text("Inscription à l'ateliers ". $workshop->getName() . ". Le mot de passe pour y accéder est: " . $workshop->getPassword() .
                " l'atelier aura lieu le : " . $workshop->getDate()->format('fr') )
            ->html("Inscription à l'ateliers ". $workshop->getName() . ". <br> Le mot de passe pour y accéder est: " . $workshop->getPassword() .
                "<br> l'atelier aura lieu le : " . $workshop->getDate()->format('fr') );

        try {
            $mailer->send($email);
        }catch (TransportExceptionInterface $e) {
            dd($e);
        }
        return new Response('Inscription réussie', Response::HTTP_OK);
    }


}