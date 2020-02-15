<?php
namespace App\Controller;

use App\Query\GetAllNotes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	/**
	 * @Route("/", name="index")
	 */
	public function index(MessageBusInterface $queryBus)
	{
		$envelope = $queryBus->dispatch(new GetAllNotes());
		$handledStamp = $envelope->last(HandledStamp::class);
		$notes = $handledStamp->getResult();

		return $this->render("index/index.html.twig", ["notes" => $notes]);
	}
}