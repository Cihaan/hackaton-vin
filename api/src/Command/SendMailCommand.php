<?php

namespace App\Command;

use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use App\Repository\WorkshopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(
    name: 'app:send-mail',
    description: 'Add a short description for your command',
)]
class SendMailCommand extends Command
{
    public function __construct(private ReservationRepository $reservationRepository, private WorkshopRepository $workshopRepository,
                                private EntityManagerInterface $entityManager, private UserRepository $userRepository, private MailerInterface $mailer)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $workshop = $this->workshopRepository->find24h(new \DateTime());
        $reservations = $this->reservationRepository->findBy(['workshop'=>$workshop, 'isConfirmed'=>true]);
        foreach ($reservations as $reservation){
            $user = $reservation->getDrinker();
            $email = (new Email())
                ->from('association@duVin.com')
                ->to($user->getEmail())
                ->subject('Bientot la dégustation'. $reservation->getWorkshop()->getName())
                ->text("Bientot la dégustation ". $reservation->getworkshop()->getName() . ". Le mot de passe pour y accéder est: " . $reservation->getWorkshop()->getPassword() .
                    " l'atelier aura lieu le : " . $reservation->getWorkshop()->getDate()->format('fr') )
                ->html("Inscription à l'ateliers ". $reservation->getWorkshop()->getName() . ". <br> Le mot de passe pour y accéder est: " . $reservation->getWorkshop()->getPassword() .
                    "<br> l'atelier aura lieu le : " . $reservation->getWorkshop()->getDate()->format('fr') );

            try {
                $this->mailer->send($email);
            }catch (TransportExceptionInterface $e) {
                dd($e);
            }
        }


        return Command::SUCCESS;
    }
}
