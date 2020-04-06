<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class UserFormType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add('Name', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Lastname', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Username', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Mail', EmailType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Password', PasswordType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('PasswordCheck', PasswordType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Role', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
            ->add('cancel', ResetType::class, [
                'label' => 'Clear',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
        ;
    }
}

