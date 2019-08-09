<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\{RepeatedType, PasswordType};

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        $form = $this->createFormBuilder()
                     ->add('username')
                     ->add('password', RepeatedType::class, [
                         'type' => PasswordType::class,
                     ]);

        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }
}
