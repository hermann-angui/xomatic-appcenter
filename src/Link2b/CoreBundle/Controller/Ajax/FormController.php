<?php

namespace Link2b\CoreBundle\Controller\Ajax;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    public function applicationFormAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('platform_name', TextType::class, ['attr' => ['data-help'  => 'Task name should be short and actionable']])
            ->add('dueDate', DateType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $application = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $em = $this->getDoctrine()->getManager();
             $em->persist($application);
             $em->flush();

            return new JsonResponse("ok");
        }
        return  $this->render('CoreBundle:Ajax:application_form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
