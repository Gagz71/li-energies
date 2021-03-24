<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Recaptcha\RecaptchaValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/comment-ca-marche", name="how_it_works")
     */
    public function how()
    {
        return $this->render('product/how.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/pourquoi-renover", name="why_renovate")
     */
    public function why()
    {
        
        return $this->render('product/why.html.twig', [
        
        ]);
    }

    /**
     * @Route("/solutions/electricite", name="electricity_production")
     */
    public function electricityProduction()
    {
        return $this->render('product/electricityProduction.html.twig',[
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/solutions/chauffe-eau", name="water_heater")
     */
    public function waterHeater()
    {
        return $this->render('product/waterHeater.html.twig',[
            'controller_name' => 'ProductController',
        ]);
    }



}
