<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/3/2019
 * Time: 23:57
 */

namespace App\Form;

use App\Entity\Level;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LevelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('latt', NumberType::class, [
                'label' => 'Szerokość geograficzna',
                'required' => true,
            ])
            ->add('longg', NumberType::class, [
                'required' => true,
                'label' => 'Długość geograficzna',
            ])
            ->add('lvlLabel', TextType::class, [
                'required' => true,
                'label' => 'Nazwa zadania',
                'attr' => [
                    'maxlength' => 200
                ]
            ])
            ->add('lvlDescr', TextType::class, [
                'required' => true,
                'label' => 'Opis zadania',
                'attr' => [
                    'maxlength' => 200
                ]
            ])
            ->add('chronologyLabel', TextType::class, [
                'required' => true,
                'label' => 'Tytuł zadania chronologicznego',
                'attr' => [
                    'maxlength' => 200
                ],
            ])
            ->add('chronologyOptions', TextType::class, [
                'required' => true,
                'label' => 'Pozycje zadania chronologicznego',
                'attr' => [
                    'placeholder' => 'Pozycja1, Pozycja2, Pozycja3...',
                    'maxlength' => 500,
                ]
            ])
            ->add('chronologyAnswer', TextType::class, [
                'required' => true,
                'label' => 'Odpowiedź zadania chronologicznego',
                'attr' => [
                    'maxlength' => 200
                    ],
             ])
            ->add('optionsLabel', TextType::class, [
                'required' => true,
                'label' => 'Tytuł zadania z opcjami',
                'attr' => [
                    'maxlength' => 200
                ]
            ])
            ->add('radioOptions', TextType::class, [
                'required' => true,
                'label' => 'Opcje zadania z opcjami',
                'attr' => [
                    'placeholder' => 'Pozycja1, Pozycja2, Pozycja3...',
                    'maxlength' => 500,
                ]
            ])
            ->add('radioAnswer', TextType::class, [
                'required' => true,
                'label' => 'Odpowiedź zadania z opcjami',
                'attr' => [
                    'maxlength' => 200
                ]
            ])
            ->add('dateLabel', TextType::class, [
                'required' => true,
                'label' => 'Pytanie dla zadania z datą',
                'attr' => [
                    'maxlength' => 200
                ],
            ])
            ->add('dateAnswer', DateType::class, [
                'required' => true,
                'label' => 'Odpowiedź dla zadania z datą',
            ])
            ->add('questionLabel', TextType::class, [
                'required' => true,
                'label' => 'Pytanie dla zadania tekstowego',
                'attr' => [
                    'maxlength' => 200
                ],
            ])
            ->add('questionAnswer', TextType::class, [
                'required' => true,
                'label' => 'Odpowiedź dla zadania tekstowego',
                'attr' => [
                    'maxlength' => 200
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver):  void
    {
        $resolver->setDefaults([
            'data_class' => Level::class,
        ]);
    }
}