<?php

// example.com/src/Simplex/TemplateResponseListener.php
namespace Simplex;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpFoundation\Response;

class TemplateResponseListener implements EventSubscriberInterface
{
    private $blade;

    public function __construct(ViewFactory $blade)
    {
        $this->blade = $blade;
    }

    public function onView(ViewEvent $event): void
    {
        $response = $event->getControllerResult();

        if ($response) {
            $event->setResponse(new Response($response));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return ['kernel.view' => 'onView'];
    }
}