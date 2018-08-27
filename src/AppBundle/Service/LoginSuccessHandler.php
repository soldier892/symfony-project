<?php

namespace AppBundle\Service;

use Psr\Container\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    private $container;

    public function __construct(ContainerInterface $contianer)
    {
        $this->container=$contianer;

    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {

        if($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')){
            if($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
                return new RedirectResponse('/admin');
            }
            return new RedirectResponse('/profile');
        }
        new RedirectResponse('/login');
    }
}