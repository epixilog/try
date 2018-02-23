<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    /**
     * @Route("/", name="page_home")
     */
    public function home()
    {
        return $this->render('page/home.html.twig', [
            'page_title' => 'Welcome!'
        ]);
    }
    
    /**
     * @Route("/contact-us", name="page_contact")
     */
    public function contact()
    {
        return $this->render('page/contact.html.twig', [
            'page_title' => 'Contact Us'
        ]);
    }
    
    /**
     * @Route("/about-us", name="page_about")
     */
    public function about()
    {
        return $this->render('page/about.html.twig', [
            'page_title' => 'About Us'
        ]);
    }
    
}
