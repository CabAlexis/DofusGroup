<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route ("/inscription", name="registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hashPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashPassword);
            $manager->persist($user);
            $manager->flush();

            $this->addFlash("success", "Votre compte a bien été créé ! Merci de vous authentifier.");

            return $this->redirectToRoute('login');
        }

        //TODO Rajouter un message d'erreur (addFlash) qd ca fonctionne pas (Champs vide rentre qd mm dans isValid??????)

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

