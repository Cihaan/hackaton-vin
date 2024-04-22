<?php

namespace App\Controller;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[ApiResource(
    collectionOperations: [
        'get' => [
            'method' => 'GET',
            'path' => '/api/my_custom_route',
            'controller' => self::class,
            'action' => 'myCustomAction',
            'openapi_context' => [
                'summary' => 'My custom action',
                'description' => 'This is a custom action',
            ],
        ],
    ],
    itemOperations: [],
)]
class SecurityController extends AbstractController
{
    #[Route('/api/login', name: 'app_login', methods: ['POST'])]
    public function login(): Response
    {
        $user = $this->getUser();
        return $this->json([
            'roles' => $user->getRoles(),
            'username' => $user->getUserIdentifier(),
        ]);

    }
}
