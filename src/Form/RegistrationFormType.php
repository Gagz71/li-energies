<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'label' => 'Adresse email',
                
                'constraints' => [
                    new Email([
                        'message' => 'L\'adresse email {{ value }} n\'est pas une adresse valide. Li.Energies a besoin de votre email pour continuer. Merci de la renseigner.'
                    ]),
                    new NotBlank([
                        'message' => 'Li.Energies a besoin de votre email pour continuer. Merci de la renseigner.'
                    ]),
                ]
            ])
            ->add('contractNumber', TextType::class, [
                'label'=>'Numéro de contrat',
                
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir votre numéro de contrat Li.Energies',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les termes.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type'=>PasswordType::class,
                'invalid_message'=> 'Veuillez saisir le même mot de passe',
                'mapped' => false,
                'first_options'=>[
                    'label'=>'Mot de passe',
                ],
                'second_options'=>[
                    'label'=>'Confirmation du mot de passe',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                        'maxMessage'=>'Le mot de passe saisi est trop grand'
                    ]),
                    new Regex([
                        'pattern'=> '/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ !"\#$%&\'\(\)*+,\-.\/:;<=>?@[\\^\]_`\{|\}~])^.{8,4096}$/',
                        'message' => 'Votre mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un caractère spécial'
                    ]),
                ],
            ])
            ->add('address', TextType::class, [
                'label'=>'Addresse',
                
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir l\'adresse d\'installation de votre équipement',
                    ]),
                ],
            ])
            ->add('zipCode',TextType::class,[
                'label'=> 'Code Postal',
                
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir le code postal du site d\'installation de votre équipement',
                    ]),
                ],
            ])
            ->add('phoneNumber', TelType::class, [
                'label' => 'Numéro de téléphone',
                
                'constraints' => [
                    new NotBlank([
                        'message' => 'Li.Energies a besoin de votre numéro de téléphone pour continuer. Merci de le renseigner.'
                    ]),
                    new Regex([
                        'pattern' => '/^([0-9]{2}[ -.]?){4}[0-9]{2}$/',
                        'message' => 'Li.Energies a besoin d\'un numéro de téléphone valide pour pouvoir vous contacter. Merci de le renseigner.'
                    ]),
                ]
            ])
            ->add('solutionsType', ChoiceType::class,[
                'label'=> 'Solutions énergétiques adoptés',
                'choices'=>[
                    'Je produis et consomme ma propre électricité'=>'production d\'électricité',
                    'Je produis et consomme ma propre eau chaude'=>'production d\'eau chaude',
                    'Je produis et consomme mon électricité et mon eau chaude'=>'production d\'électricité + d\eau chaude',
                ],
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir votre solution Li.Energies adoptée',
                    ]),
                ],
            ])
            ->add('selfConsumptionType', ChoiceType::class,[
                'label'=>'Type d\'autoconsommation adopté',
                'choices'=>[
                    'Autoconsommation avec revente du surplus'=>'revente du surplus',
                    'Autoconsommation avec batterie de stockage'=>'stockage avec batterie',
                ],
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir votre type d\'autoconsommation adopté',
                    ]),
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Créer mon compte',
                'attr' => [
                    'class' => 'btn button-form'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
