<?php

namespace App\Form;

use App\Entity\Livres;
use App\Entity\Auteurs;
use App\Entity\Bibliotheques;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('year')
            ->add('pageNum')
            ->add('auteurs', EntityType::class, [
                'class' => Auteurs::class, 
                'choice_label' => 'name'
            ])
            ->add('bibliotheque', EntityType::class, [
                'class' => Bibliotheques::class, 
                'choice_label' => 'name'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livres::class,
        ]);
    }
}