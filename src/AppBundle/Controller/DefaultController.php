<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:default:index.html.twig', [
            'data' => 'Need auth'
        ]);
    }

    /**
     * @Route("/page", name="page")
     */
    public function pageAction()
    {
        return $this->render('AppBundle:default:index.html.twig', [
            'data' => 'Auth successful'
        ]);
    }

    /**
     * @Route("/auth/{token}", name="auth")
     */
    public function authAction($token)
    {
        if ($token == 'ABC') {
            $user = new \AppBundle\Entity\User('login', 'pass', ['ROLE_USER']);

            $systemToken = new UsernamePasswordToken($user, null, 'main', ['ROLE_USER']);
            $this->get('security.token_storage')->setToken($systemToken);
            $this->get('session')->set('_security_main', serialize($systemToken));

            return $this->redirectToRoute('page');
        }
        return new Response('Invalid token', 500);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }
}
