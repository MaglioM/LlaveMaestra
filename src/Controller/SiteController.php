<?php

namespace App\Controller;

use App\Entity\Site;
use App\Form\SiteType;
use App\Form\RandomPasswordType;
use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

#[Route('/site')]
class SiteController extends AbstractController
{
    #[Route('/', name: 'site_index', methods: ['GET'])]
    public function index(SiteRepository $siteRepository, UserInterface $user): Response
    {
        return $this->render('site/index.html.twig', [
            'sites' => $siteRepository->findByCreatedBy($user->getId()),
        ]);
    }

    #[Route('/new', name: 'site_new', methods: ['GET','POST'])]
    public function new(Request $request, UserInterface $user): Response
    {
        $site = new Site();
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);
        $randomPasswordForm = $this->createForm(RandomPasswordType::class);
        $randomPasswordForm->handleRequest($request);

	if ($randomPasswordForm->isSubmitted()){
	    $password = $site->generateRandomPassword(12);
	    $form->get('LoginPassword')->setData($password);
	}

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
	    $site->setCreatedAt(new \DateTimeImmutable());
	    $site->addIdUser($user);
	    $site->setCreatedBy($user);
            $entityManager->persist($site);
            $entityManager->flush();

            return $this->redirectToRoute('site_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('site/new.html.twig', [
            'site' => $site,
	    'form' => $form,
	    'randomPasswordForm' => $randomPasswordForm,
        ]);
    }

    #[Route('/{id}', name: 'site_show', methods: ['GET'])]
    public function show(Site $site): Response
    {
        return $this->render('site/show.html.twig', [
            'site' => $site,
        ]);
    }

    #[Route('/{id}/edit', name: 'site_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Site $site): Response
    {
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);
        $randomPasswordForm = $this->createForm(RandomPasswordType::class);
        $randomPasswordForm->handleRequest($request);

	if ($randomPasswordForm->isSubmitted()){
	    $password = $site->generateRandomPassword(12);
	    $form->get('LoginPassword')->setData($password);
	}

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('site_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('site/edit.html.twig', [
            'site' => $site,
            'form' => $form,
	    'randomPasswordForm' => $randomPasswordForm,
        ]);
    }

    #[Route('/{id}/share', name: 'site_share', methods: ['GET'])]
    public function share(Request $request, Site $site): Response
    {
        return $this->render('site/share.html.twig', [
            'site' => $site,
        ]);
    }

    #[Route('/{id}', name: 'site_delete', methods: ['POST'])]
    public function delete(Request $request, Site $site): Response
    {
        if ($this->isCsrfTokenValid('delete'.$site->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($site);
            $entityManager->flush();
        }

        return $this->redirectToRoute('site_index', [], Response::HTTP_SEE_OTHER);
    }
}
