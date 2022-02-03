<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class Project1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, ['label' => 'Nom du projet'])
            ->add('projectFile', VichImageType::class, [
                'label' => 'Photo',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => false,
                'help' => 'L\'image ne doit pas dépasser 2M et doit être au format : jpg, jpeg, png, ou webp.'
            ])
            ->add('date',DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('description', TextareaType::class, ['label' => 'Description', 'attr' => ['rows' => '4']])
            ->add('url', UrlType::class, ['label' => 'Lien', ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
