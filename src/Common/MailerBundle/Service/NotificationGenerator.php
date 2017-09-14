<?php

namespace Common\MailerBundle\Service;

use Common\EntityBundle\Entity\User;

class NotificationGenerator {
    public function sendNotification(User $receiver, $content) {

        $message = (new \Swift_Message('GITE29 Notification'))
            ->setFrom('GITE29')
            ->setTo($receiver->getEmail())
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'FrontGiteBundle:Request:notification.html.twig',
                    array(
                        'receiver' => $receiver,
                        'content' => $content
                    )
                ),
                'text/html'
            );
    }
}