<?php

namespace App\Command;

use App\Repository\ReservationRepository;
use App\Repository\WorkshopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:delete-reservation',
    description: 'Add a short description for your command',
)]
class DeleteReservationCommand extends Command
{
    public function __construct(private ReservationRepository $reservationRepository, private WorkshopRepository $workshopRepository,
    private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
//        $this
//            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
//        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
//        $io = new SymfonyStyle($input, $output);
//        $arg1 = $input->getArgument('arg1');

        $workshops = $this->workshopRepository->findPastDate(new \DateTime());
//
        $reservations = $this->reservationRepository->findBy(['workshop'=>$workshops]);
//        dd($reservations);
        foreach ($reservations as $reservation){
            $this->entityManager->remove($reservation);
            $this->entityManager->flush();
        }

        return Command::SUCCESS;
    }
}
