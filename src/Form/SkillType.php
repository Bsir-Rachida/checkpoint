<?php

namespace App\Form;

use App\Entity\LevelSkill;
use App\Entity\Skill;

use App\Entity\Project;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom de la compétence'])
            ->add('level_skill', EntityType::class, ['class' => LevelSkill::class, 'choice_label' => 'number', 'multiple' => false, 'expanded' => false, 'label' => 'Niveau', 'placeholder' => 'Sélectionnez votre choix',])
            ->add('projects', EntityType::class, ['class' => Project::class, 'choice_label' => 'name', 'multiple' => true, 'expanded' => true, 'label' => 'Projets',]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Skill::class,
        ]);
    }
}
