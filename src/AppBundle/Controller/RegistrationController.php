<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegistrationForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/create/user/", name="create_user")
     */
    public function createUser(Request $request)
    {
        $form = $this->createForm(RegistrationForm::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $employeeService = $this->get("app.service.employees");

            if ($employeeService->createEmployee($form)) {
                return $this->redirectToRoute('fos_user_security_login');
            }
        }

        return $this->render('/Registration/registration.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
