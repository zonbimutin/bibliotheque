<?php

namespace App\Form;

use App\Entity\Auteurs;
use App\Entity\Livres;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('name')
            ->add('age')
            ->add(
                'livres',
                EntityType::class,
                [
                    'class' => Livres::class,
                    'choice_label' => 'title',
                    'required' => true,
                    'multiple' => true,
                    'expanded' => true,
                ]
             )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Auteurs::class,
        ]);
    }
}
