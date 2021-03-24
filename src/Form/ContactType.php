<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Importation du type bouton de validation
use Symfony\Component\Form\Extension\Core\Type\TextType; //Importation du type TextType
use Symfony\Component\Form\Extension\Core\Type\TextareaType; //Importation du type TextAreaType
use Symfony\Component\Form\Extension\Core\Type\EmailType; //Importation du type EmailType
use Symfony\Component\Form\Extension\Core\Type\CheckboxType; //Importation du type Checkbox
use Symfony\Component\Form\Extension\Core\Type\TelType; //Importation du type TelType
use Symfony\Component\Validator\Constraints\Length; //Importation des contraintes (Longueur string)
use Symfony\Component\Validator\Constraints\NotBlank; //Importation des contraintes (ne dois pas être vide)
use Symfony\Component\Validator\Constraints\Email; //Importations des contraintes de validations d'emails
use Symfony\Component\Validator\Constraints\Regex; //Importations des Regex
use Symfony\Component\Validator\Constraints\IsTrue; //Importation de la contrainte IsTrue

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class,[
                'label' => 'Nom',
                'attr'=> [
                    'placeholder'=> 'Votre nom de famille'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Li.Energies a besoin de votre nom pour continuer. Merci de le renseigner.'
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Li.Energies a besoin de votre nom pour continuer. Merci de le renseigner.',
                        'maxMessage' => 'Li.Energies a besoin de votre nom pour continuer. Merci de le renseigner.',
                    ]),
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr'=> [
                    'placeholder'=> 'Votre prénom'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Li.Energies a besoin de votre prénom pour continuer. Merci de le renseigner.'
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Li.Energies a besoin de votre prénom pour continuer. Merci de le renseigner.',
                        'maxMessage' => 'Li.Energies a besoin de votre prénom pour continuer. Merci de le renseigner.',
                    ]),
                ]
            ])

            ->add('email', EmailType::class,[
                'label' => 'Adresse email',
                'attr'=> [
                    'placeholder'=> 'Votre adresse mail'
                ],
                'constraints' => [
                    new Email([
                        'message' => 'L\'adresse email {{ value }} n\'est pas une adresse valide. Li.Energies a besoin de votre email pour continuer.
                        Merci de la renseigner.'
                    ]),
                    new NotBlank([
                        'message' => 'Li.Energies a besoin de votre email pour continuer. Merci de la renseigner.'
                    ]),
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone',
                'attr'=> [
                    'placeholder'=> 'Votre numéro de téléphone (format 00.00.00.00.00 ou 00-00-00-00-00 ou 00 00 00 00 00)'
                ],
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
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr'=> [
                    'placeholder'=> 'Saisissez la ville du site'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Li.Energies a besoin de votre ville de résidence pour continuer. Merci de le renseigner.'
                    ]),
                ]
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Code Postal',
                'attr'=> [
                    'placeholder'=> 'Saisissez le code postal du site'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Li.Energies a besoin de votre ville de résidence pour continuer. Merci de le renseigner.'
                    ]),
                    new Regex([
                        'pattern' => '/^0[1-9]|[1-8][0-9]|9[0-8]|2A|2B$/',
                        'message' => 'Li.Energies a besoin de votre numéro de département pour continuer. Merci de le renseigner.'
                    ])
                ]
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',
                'attr' => [
                    'placeholder' => 'Sujet du message'
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'placeholder' => 'Votre demande'
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label'=> 'Accepter les conditions',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos règles et conditions.',
                    ]),
                ],
            ])
            ->add('save', SubmitType::class, [ // Ajout d'un champ de type bouton de validation
                'label' => 'Envoyer ma demande',
                'attr' => [
                    'class' => 'button blue-shadow button-form',
                    'style' => 'width: 40%; margin: auto; padding: 10px;border: groove 2px;font-size: large;',
                    'style'=> '@media screen and (min-width: 320px) and (max-width: 600px){width:90%}'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class

        ]);
    }
}
