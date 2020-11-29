<?php

namespace App\Controller;

use App\Entity\Character;
use App\Form\CharacterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    /**
     * @Route("/character/new", name="add_character")
     */
    public function createCharacter(Request $request, EntityManagerInterface $manager): Response
    {
        $character = new Character();
        $addCharacterForm = $this->createForm(CharacterType::class, $character);
        $addCharacterForm->handleRequest($request);
        


        if ($addCharacterForm->isSubmitted() && $addCharacterForm->isValid())
        {
            $character->setUser($this->getUser());
            $manager->persist($character);
            $manager->flush();

            $this->addFlash("success", "Votre personnage a bien été ajouté !");

            return $this->redirectToRoute('home');
        }

        return $this->render('character/add.html.twig', [
            'addCharacterForm' => $addCharacterForm->createView(),
        ]);
    }
}
