<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/3/2019
 * Time: 23:57
 */

namespace App\Form;

use App\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('link', UrlType::class, [
                'empty_data' => 'Link',
                'label' => 'Link do zewnętrznego artykułu',
            ])
            ->add('title', TextType::class, [
                'required' => true,
                'empty_data' => 'Tytuł',
                'label' => 'Tytuł wiadomości',
            ])
            ->add('description', TextareaType::class, [
                'required' => true,
                'empty_data' => 'Opis',
                'label' => 'Opis wiadomości',
                'attr' => [
                    'maxlength' => 600
                ]
            ])
            ->add('image', FileType::class, [
                'empty_data' => 'Zdjęcie',
                'label' => 'Zdjęcie',
                'data_class' => null
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver):  void
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}