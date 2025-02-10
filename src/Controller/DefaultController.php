<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;


class DefaultController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function index(AnnonceRepository $annonceRepository, Request $request): Response
    {
        // Récupérer les filtres depuis la requête
        $categorie = $request->query->get('categorie');
        $ville = $request->query->get('ville');

        // Récupérer les annonces filtrées
        $annonces = $annonceRepository->findByFilters($categorie, $ville);

        return $this->render('default/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }

    #[Route('/create-user', name: 'create_user')]
    public function createUser(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $user->setUsername('testuser');

        // Hash du mot de passe
        $hashedPassword = $passwordHasher->hashPassword($user, 'password');
        $user->setPassword($hashedPassword);

        // Ajout du rôle utilisateur
        $user->setRoles(['ROLE_USER']);

        // Sauvegarde en base
        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('Utilisateur créé avec succès !');
    }

}