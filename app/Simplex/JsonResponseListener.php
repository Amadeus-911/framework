<?php 
// example.com/src/Simplex/JSONResponseListener.php
namespace Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class JSONResponseListener implements EventSubscriberInterface
{
    public function onView(ViewEvent $event): void
    {
        $response = $event->getControllerResult();

        if (is_array($response) || is_object($response)) {
            $jsonData = json_encode($response);
            if (json_last_error() === JSON_ERROR_NONE) {
                $event->setResponse(new Response($jsonData, 200, ['Content-Type' => 'application/json']));
            }
        }
    }

    public static function getSubscribedEvents(): array
    {
        return ['kernel.view' => 'onView'];
    }
}