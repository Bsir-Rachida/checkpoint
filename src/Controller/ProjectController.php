<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Skill;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/realisations", name="project")
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }


    /**
     * @Route("/realisations/competences", name="project_skills")
     */
    public function show(Project $project): Response
    {
        $skills = $project->getSkill();
        return $this->render('project/show.html.twig', [
            'skills' => $skills,
            'project' => $project,
        ]);
    }
    
}
