<?php
namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// use Symfony\Component\Form\Extension\Core\Type\EmailType;
// use Symfony\Component\Form\Extension\Core\Type\FormType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\PasswordType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\ResetType;

class UserFormType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
//         $builder
//             ->add('Name', TextType::class, [
//                 'attr' => ['class' => 'form-control']
//             ])
//             ->add('Lastname', TextType::class, [
//                 'attr' => ['class' => 'form-control']
//             ])
//             ->add('Username', TextType::class, [
//                 'attr' => ['class' => 'form-control']
//             ])
//             ->add('Mail', EmailType::class, [
//                 'attr' => ['class' => 'form-control']
//             ])
//             ->add('Password', PasswordType::class, [
//                 'attr' => ['class' => 'form-control']
//             ])
//             ->add('PasswordCheck', PasswordType::class, [
//                 'attr' => ['class' => 'form-control']
//             ])
//             ->add('Role', TextType::class, [
//                 'attr' => ['class' => 'form-control']
//             ])
//             ->add('save', SubmitType::class, [
//                 'label' => 'Create',
//                 'attr' => ['class' => 'btn btn-primary mt-3']
//             ])
//             ->add('cancel', ResetType::class, [
//                 'label' => 'Clear',
//                 'attr' => ['class' => 'btn btn-primary mt-3']
//             ])
//         ;

        $builder
        ->add('Name',null,['attr' => ['class' => 'form-control']])
        ->add('Lastname',null,['attr' => ['class' => 'form-control']])
        ->add('Username',null,['attr' => ['class' => 'form-control']])
        ->add('Mail',null,['attr' => ['class' => 'form-control']])
        ->add('Password',null,['attr' => ['class' => 'form-control']])
        ->add('PasswordCheck',null,['attr' => ['class' => 'form-control']])
        ->add('Role',null,['attr' => ['class' => 'form-control']])
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => User::class     //Bind the form to data class
                                            //(Resolution auto des types des champs du formulaire à partir des éléments de la classe ;-)
        ]);
    }
    
}

