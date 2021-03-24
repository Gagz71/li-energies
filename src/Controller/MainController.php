<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\MessageCustomer;
use App\Form\MessageCustomerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class MainController extends AbstractController
{
    /**
     * P.d'accueil
     * @Route("/", name="home")
     */
    public function home()
    {


        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController'

        ]);
    }



    /**
     * @Route("/notre-societe", name="society")
     */
    public function society()
    {
        return $this->render('main/society.html.twig');
    }
    
    
    /**
     * @Route("/mon-espace-client", name="profil")
     * @Security("is_granted('ROLE_USER')")
     */
    public function profil(Request $request, PaginatorInterface $paginator)
    {
        // Si la personne qui essaye de venir sur cette page n'est pas connectée, elle sera redirigée à la page de connexion par le firewall
    
        
        
        
        //Création d'un nouveau message client vide
        $messageCustomer = new MessageCustomer();
    
        // Création d'un nouveau formulaire MessageCustomerType, qui hydratera le message du client $messageCustomer
        $form = $this->createForm(MessageCustomerType::class, $messageCustomer);
    
        // Remplissage du traitement du formulaire avec les données POST (sous forme d'objet $request)
        $form->handleRequest($request);
    
        //Si le formulaire est envoyé et est valide
        if($form->isSubmitted() && $form->isValid()){
            
            //Récupération du client actuellement connecté
            $customerConnected = $this->getUser();
            
            //Hydratation de la date du message et de l'auteur du message
            $messageCustomer
                ->setMessageDate(new \DateTime())
                ->setMessageAuthor( $customerConnected )
            ;
    
            // Récupération du manager général des entités
            $em = $this->getDoctrine()->getManager();
    
            // Persistance de l'article auprès de Doctrine
            $em->persist($messageCustomer);
    
            // Application de la sauvegarde en bdd
            $em->flush();
    
            // Création d'un message flash pour afficher le succès de la création de l'article
            $this->addFlash('success', 'Votre message a été envoyé avec succès ! Li-Energies vous recontactera dans les plus brefs délais. Merci de votre confiance !');
            
        }
        
        
        
//        TODO: Récupérer et afficher le nombre total de messages de chaque customer
        //Récupération de tous les messages envoyés avec utilisation du paginator
        // On récupère dans l'url la données GET page (si elle n'existe pas, la valeur retournée par défaut sera la page 1)
        $requestedPage = $request->query->getInt('page', 1);

        // Si le numéro de page demandé dans l'url est inférieur à 1, erreur 404
        if($requestedPage < 1){
            throw new NotFoundHttpException();
        }

        // Récupération du manager des entités
        $em = $this->getDoctrine()->getManager();

        // Création d'une requête qui servira au paginator pour récupérer les articles de la page courante
        $query = $em->createQuery('SELECT a FROM App\Entity\MessageCustomer a');

        // On stocke dans $pageArticles les 10 articles de la page demandée dans l'URL
        $pageMessages = $paginator->paginate(
            $query,     // Requête de selection des articles en BDD
            $requestedPage,     // Numéro de la page dont on veux les articles
            5      // Nombre d'articles par page
        );
//
//
//        // Récupération du repository des customers
//        $CustomerRepo = $this->getDoctrine()->getRepository(Customer::class);
//
//// On demande au repository de nous donner tous les articles avec un titre égal ou plus grand que 10 caractères (c'est notre nouvelle méthode !)
//        $messagesCount = $CustomerRepo->countByAccount();
        
        return $this->render('main/profil.html.twig', [
            'MessageCustomerForm'=> $form->createView(),
            'messagesCustomer'=> $pageMessages
//            'messagesCount'=> $messagesCount,
        ]);
    
    }
    
    /**
     * @Route ("/mentions-legales", name="legals_conditions")
     */
    public function legalsConditions(){
        return $this->render('main/c-g-u.html.twig');
    }
    
    
}
