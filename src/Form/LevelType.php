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
            ])
            ->add('lvlDescr', TextType::class, [
                'required' => true,
                'label' => 'Opis zadania',
            ])
            ->add('lvlDescr', TextType::class, [
                'required' => true,
                'label' => 'Opis zadania',
            ])
            ->add('chronologyLabel', TextType::class, [
                'required' => true,
                'label' => 'Tytuł zadania chronologicznego',
            ])
            ->add('chronologyOptions', TextType::class, [
                'required' => true,
                'label' => 'Pozycje zadania chronologicznego',
                'attr' => [
                    'placeholder' => 'Pozycja1, Pozycja2, Pozycja3...'
                ]
            ])
            ->add('chronologyAnswer', TextType::class, [
                'required' => true,
                'label' => 'Odpowiedź zadania chronologicznego',
            ])
            ->add('optionsLabel', TextType::class, [
                'required' => true,
                'label' => 'Tytuł zadania z opcjami',
            ])
            ->add('radioOptions', TextType::class, [
                'required' => true,
                'label' => 'Opcje zadania z opcjami',
                'attr' => [
                    'placeholder' => 'Pozycja1, Pozycja2, Pozycja3...'
                ]
            ])
            ->add('radioAnswer', TextType::class, [
                'required' => true,
                'label' => 'Odpowiedź zadania z opcjami',
            ])
            ->add('dateLabel', TextType::class, [
                'required' => true,
                'label' => 'Pytanie dla zadania z datą',
            ])
            ->add('dateAnswer', DateType::class, [
                'required' => true,
                'label' => 'Odpowiedź dla zadania z datą',
            ])
            ->add('questionLabel', TextType::class, [
                'required' => true,
                'label' => 'Pytanie dla zadania tekstowego',
            ])
            ->add('questionAnswer', TextType::class, [
                'required' => true,
                'label' => 'Odpowiedź dla zadania tekstowego',
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