<?php

namespace Common\MailerBundle\Service;

use Common\EntityBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;

class NotificationGenerator {

    private $mailer;

    private $templating;

    public function __construct(ContainerInterface $container)
    {
        $this->mailer = $container->get('mailer');
        $this->templating = $container->get('templating');
    }

    public function sendNotification(User $receiver, $content) {

        $message = (new \Swift_Message('GITE29 notification'))
            ->setFrom('gite29@gmail.com')
//            ->setTo($receiver->getEmail())
            ->setTo("math.allain29@gmail.com")
            ->setBody(
                $this->templating->render(
                // app/Resources/views/Emails/registration.html.twig
                    'CommonMailerBundle:Notification:rentalRequest.html.twig',
                    array(
                        'receiver' => $receiver,
                        'content' => $content
                    )
                ),
                'text/html'
            );
        $this->mailer->send($message);

    }
}