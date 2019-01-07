<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/6/2019
 * Time: 15:35
 */

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class, [
                'required' => true,
                'empty_data' => 'Treść komentarza',
                'label' => 'Podaj treść komentarza',
                'attr' => [
                    'rows' => 5,
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver):  void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}