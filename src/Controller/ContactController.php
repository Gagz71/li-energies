<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use \DateTime;
use App\Recaptcha\RecaptchaValidator;  // Importation de notre service de validation du captcha
use Symfony\Component\Form\FormError;  // Importation de la classe permettant de créer des erreurs dans les formulaires



    class ContactController extends AbstractController
    {

    /**
     * P. de contact
     * @Route("/contactez-nous", name="contact")
     */
    public function contact(Request $request, MailerInterface $mailer, RecaptchaValidator $recaptcha)
    {
        //Création d'un nouveau contact
        $newContact = new Contact();
        // Création d'un nouveau formulaire à partir de notre formulaire ContactType et de notre nouvel Contact encore vide
        $form = $this->createForm(ContactType::class, $newContact);

        // Symfony va remplir $newContact grâce aux données du formulaire envoyé (accessibles dans l'objet Request)
        $form->handleRequest($request);

        // Si le formulaire est envoyé
        if($form->isSubmitted()){
            
            // Si le captcha n'est pas valide, on crée une nouvelle erreur dans le formulaire (ce qui l'empêchera de créer l'article et affichera l'erreur)
            if(!$recaptcha->verify( $request->request->get('g-recaptcha-response'), $request->server->get('REMOTE_ADDR') )){
                // Ajout d'une nouvelle erreur manuellement dans le formulaire
                $form->addError(new FormError('Le Captcha doit être validé !'));
            }
            //Si le formulaire est valide
            if($form->isValid()) {
    
                // Hydratation de la date de contact
                $newContact->setContactDate(new DateTime());
//
//                // Récupération du manager général des entités
//                $em = $this->getDoctrine()->getManager();
//
//                // Persistance du nouvel user auprès de Doctrine
//                $em->persist($newContact);
//
//                // Application de la sauvegarde en bdd
//                $em->flush();
                
                //Envoie de l'email
                //Création du mail
                $email = (new TemplatedEmail())
                    ->from(new Address($newContact->getEmail(), 'email'))
                    ->to('contact.lienergies@gmail.com')
                    //->cc('cc@example.com')
                    //->bcc('bcc@example.com')
                    //->replyTo('fabien@example.com')
                    //->priority(Email::PRIORITY_HIGH)
                    ->subject('Demande de contacte sur Li-Energies.fr')
                    ->html(
                        '<h1>Bonjour Monsieur MANHOULI</h1>
                               <p class="lead">Vous avez une nouvelle demande de contacte.</p>
                                <p>Mr./Mme. '.$newContact->getLastname().' '.$newContact->getFirstname().', vous a
                                laissé un message sur le site <a href="#">Li-energies.fr</a> le
                                '.$newContact->getContactDate()->format('d/m/Y').'.</p>
                                <p>Vous trouverez ci-dessus le contenu de la demande de contacte.</p>
                                <hr>
                                <p class="text-center">Coordonnées:
                                    <ul>
                                        <li>Email: '.$newContact->getEmail().'</li>
                                        <li>N°de téléphone: '.$newContact->getPhone().'</li>
                                        <li>Code Postal: '.$newContact->getZipCode().'</li>
                                        <li>Ville: '.$newContact->getCity().'</li>
                                    </ul>
                                </p>
                                <p class="text-center">Demande:
                                    <ul>
                                        <li>Sujet: '.$newContact->getSubject().'</li>
                                        <li>Message: '.$newContact->getMessage().'</li>
                                    </ul>
                                </p>
                                <hr>
                                A Bientôt !'
                    );
                
                $transport = new GmailSmtpTransport('contact.lienergies', 'Energies71');
                $mailer = new Mailer($transport);
                //Envoi du mail
                $mailer->send($email);
    
                // Création d'un message flash pour afficher le succès de la création de l'user
                $this->addFlash('success',
                    'Votre demande a bien été envoyé ! Li.Energies vous contactera dans les plus brefs délais.');
    
                // Redirection de l'utilisateur sur la route "home" (la page d'accueil)
                return $this->redirectToRoute('home');
            }
        }

        return $this->render('main/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }




}
