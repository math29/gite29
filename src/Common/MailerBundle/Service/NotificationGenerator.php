<?php

namespace Common\MailerBundle\Service;

use Common\EntityBundle\Entity\InformationRequest;
use Common\EntityBundle\Entity\RentRequest;
use Common\EntityBundle\Entity\User;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Error\Error;

class NotificationGenerator {

    private $mailer;

    private $templating;

    private $notifier;

    private $flashbag;

    private $logger;

    private $noReplyEmail = 'noreply@gite29.com';

    public function __construct(ContainerInterface $container)
    {
        $this->flashbag = $container->get('session')->getFlashBag();
        $this->mailer = $container->get('mailer');
        $this->templating = $container->get('templating');
        $this->notifier = $container->get('mgilet.notification');
        $this->logger = $container->get('logger');
    }

    public function sendRequestRentalNotification(RentRequest $rentRequest) {
        $notification = $this->notifier->createNotification('Demande de location');
        $notification->setMessage('{$rentRequest->getFirstName()} vous a envoyé une demande de location. 
        Vérifiez votre boite mail pour plus d\'informations');
//        $this->notifier->addNotification(array($rentRequest->getGite()->getOwner()), $notification, true);
        try {
            $message = \Swift_Message::newInstance()
                ->setSubject('Gite29 notification: Demande de location')
                ->setFrom($this->noReplyEmail)
                ->setTo($rentRequest->getGite()->getOwner()->getEmail())
                ->setBody(
                    $this->templating->render(
                        'CommonMailerBundle:Notification:rentalRequest.html.twig',
                        array(
                            'rentRequest' => $rentRequest
                        )
                    ),
                    'text/html'
                );
            $this->mailer->send($message);
            $this->flashbag->add('success', 'Votre requete a bien été envoyé');
            $this->notifier->addNotification(array($rentRequest->getGite()->getOwner()), $notification, true);
        } catch (Error $e) {
            $this->logger->error('Failed to send notification email', $e);
        } catch (OptimisticLockException $e) {
            $this->logger->error('Failed to send notification to owner', $e);
        }
    }

    public function sendInformationRequestNotification(User $receiver, InformationRequest $informationRequest) {
        $notification = $this->notifier->createNotification('Demande d\'information');
        $notification->setMessage('{$informationRequest->getFirstName()} vous a envoyé une demande d\ínformations. 
        Vérifiez votre boite mail pour plus d\'informations');
//        $this->notifier->addNotification(array($informationRequest->getGite()->getOwner()), $notification, true);
        try {
            $message = \Swift_Message::newInstance()
                ->setSubject('Gite29 notification: Demande d\'informations')
                ->setFrom($this->noReplyEmail)
                ->setTo($receiver->getEmail())
                ->setBody(
                    $this->templating->render(
                        'CommonMailerBundle:Notification:informationRequest.html.twig',
                        array(
                            'receiver' => $receiver,
                            'informationRequest' => $informationRequest
                        )
                    ),
                    'text/html'
                );
            $this->mailer->send($message);
            $this->flashbag->add('success', 'Votre requete a bien été envoyé');
        } catch (Error $e) {
            $this->logger->error('Failed to send notification email', $e);
        }
    }
}