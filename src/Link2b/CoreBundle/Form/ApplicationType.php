<?php

namespace Link2b\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ApplicationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class, ['attr' => ['data-help'  => '']])
                ->add('version',TextType::class, ['attr' => ['data-help'  => '']])
                ->add('description',TextType::class, ['attr' => ['data-help'  => '']])
                ->add('dateCreated', DateType::class)
                ->add('lastUpdated', DateType::class)
                ->add('note',TextType::class, ['attr' => ['data-help'  => '']])
                ->add('ftpServer',TextType::class, ['attr' => ['data-help'  => '']])
                ->add('ftpPasssword',TextType::class, ['attr' => ['data-help'  => '']])
                ->add('githubBranch',TextType::class, ['attr' => ['data-help'  => '']])
                ->add('githubMaster',TextType::class, ['attr' => ['data-help'  => '']]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Link2b\CoreBundle\Entity\Application'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'link2b_corebundle_application';
    }


}
