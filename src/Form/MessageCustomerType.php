<?php

namespace App\Form;

use App\Entity\MessageCustomer;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class MessageCustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', TextType::class,[
                'label'=>'Objet',
                'constraints'=>[
                    new Length([ //Ajout de taille à respecter
                        'min' => 2, //minimum 2 caractères
                        'max' => 150, //ds Article.php, dans déclaration de private $title, on a déclarer le varchar pr las bdd en commentaire, cétait mis =150
                        'minMessage' => 'Votre objet doit contenir au minimum 2 caractères', //Message d'erreur pour
                        // taille min
                        'maxMessage' => 'Votre objet doit contenir au maximum 150 caractères',
                    ]),
                    new NotBlank([ //Ajout d'une classe qui permet d'obliger 'l'utilisateur à saisir le champs
                        'message' => 'Merci de renseigner un objet de message'
                    ])
                ]
            ])
            ->add('message', CKEditorType::class, [
                'label'=>'Message',
                'purify_html' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un contenu'
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Le contenu doit contenir au moins {{ limit }} caractères',
                        'max' => 5000,
                        'maxMessage' => 'Le contenu doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
    
            ->add('save', SubmitType::class, [ // Ajout d'un champ de type bouton de validation
                'label' => 'Envoyer ma demande',
                'attr' => [
                    'class' => 'button blue-shadow button-form',
                    'style' => 'width: 40%; margin: auto; padding: 10px;border: groove 2px;font-size: large;'
                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MessageCustomer::class,
        ]);
    }
}
