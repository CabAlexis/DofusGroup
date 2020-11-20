<?php

namespace App\Controller;

use App\Entity\Character;
use App\Entity\CharacterDungeonRequestUser;
use App\Entity\Dungeon;
use App\Form\DungeonRequestType;
use App\Entity\DungeonRequest;
use App\Repository\DungeonRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DungeonRequestController extends AbstractController
{
    /**
     * @Route("/dungeonRequest/new", name="create_dungeon_request")
     */
    public function createDungeonRequest(Request $request, EntityManagerInterface $manager)
    {
        $dungeonRequest = new DungeonRequest();
        $charactersRepository = $manager-> getRepository(Character::class);

        $dungeonRequestForm = $this->createForm(DungeonRequestType::class, $dungeonRequest);
        $dungeonRequestForm->handleRequest($request);

        $userId = $this->getUser()->getId();
        $characterId = $request->get('character');
        $charactersList = $charactersRepository -> findBy(['user' => $userId]);

        if ($dungeonRequestForm->isSubmitted() && $dungeonRequestForm->isValid()){
            // TODO Peut-etre une refacto a faire par ici 
            $manager->getRepository(CharacterDungeonRequestUser::class);
            $characterDungeonRequestUser = new CharacterDungeonRequestUser();
            $characterDungeonRequestUser->setUser($this->getUser());
            $characterDungeonRequestUser->setCreator(1);
            $characterDungeonRequestUser->setDungeonRequest($dungeonRequest);
            $characterDungeonRequestUser->setLevel($request->get('level'));
            $characterDungeonRequestUser->setOwnersCharacter($charactersRepository -> find($characterId));
            $manager->persist($dungeonRequest);
            $manager->persist($characterDungeonRequestUser);
            $manager->flush();

            $this->addFlash("success", "Votre demande a bien été créé !");

            return $this->redirectToRoute('home');

        }

        return $this->render('dungeon_request/new.html.twig', [
            'dungeonRequestForm' => $dungeonRequestForm->createView(),
            'characters' => $charactersList
        ]);
    }

    /**
     * @Route("/dungeonRequest/list", name="list_dungeon_request")
     */
    public function listDungeonRequest(DungeonRequestRepository $dungeonRequestRepository, Request $request)
    {
        $dungeonRequestList = $dungeonRequestRepository->findAll();

        $search = $request->query->get('search');
        $dungeonRequestByDungeon = $dungeonRequestRepository->findByDungeonName($search);
        // dd($dungeonRequestList);
        return $this->render('dungeon_request/list.html.twig', [
            'dungeonRequests' => $dungeonRequestList,
            'dungeonSearch' => $dungeonRequestByDungeon
        ]);
    }
}
