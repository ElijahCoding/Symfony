<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\{RepeatedType, PasswordType, SubmitType};

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request)
    {
        $form = $this->createFormBuilder()
                     ->add('username')
                     ->add('password', RepeatedType::class, [
                         'type' => PasswordType::class,
                         'first_options'  => ['label' => 'Password'],
                         'second_options' => ['label' => 'Repeat Password'],
                     ])
                     ->add('register', SubmitType::class, [
                         'attr' => [
                             'class' => 'btn btn-success float-right'
                         ]
                     ])
                     ->getForm();

        $form->handleRequest($request);

        if ($form->submitted()) {
            
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
