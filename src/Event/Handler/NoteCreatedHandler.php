<?php
namespace App\Event\Handler;

use App\Event\NoteCreated;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class NoteCreatedHandler implements MessageHandlerInterface
{
	private $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	public function __invoke(NoteCreated $event)
	{
		$noteId = $event->getNoteId()->toString();
		$this->logger->debug("Note with id $noteId has been created");
	}
}