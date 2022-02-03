<?php

namespace App\Controller;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/competences")
 */
class AdminSkillController extends AbstractController
{
    /**
     * @Route("/", name="admin_skill_index", methods={"GET"})
     */
    public function index(SkillRepository $skillRepository): Response
    {
        return $this->render('admin_skill/index.html.twig', [
            'skills' => $skillRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_skill_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($skill);
            $entityManager->flush();

            return $this->redirectToRoute('admin_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_skill/new.html.twig', [
            'skill' => $skill,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_skill_show", methods={"GET"})
     */
    public function show(Skill $skill): Response
    {
        return $this->render('admin_skill/show.html.twig', [
            'skill' => $skill,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_skill_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Skill $skill, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_skill/edit.html.twig', [
            'skill' => $skill,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_skill_delete", methods={"POST"})
     */
    public function delete(Request $request, Skill $skill, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skill->getId(), $request->request->get('_token'))) {
            $entityManager->remove($skill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_skill_index', [], Response::HTTP_SEE_OTHER);
    }
}
