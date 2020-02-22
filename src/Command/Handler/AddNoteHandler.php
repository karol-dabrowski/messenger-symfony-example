<?php
namespace App\Command\Handler;

use App\Command\AddNote;
use App\Entity\Note;
use App\Event\NoteCreated;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DispatchAfterCurrentBusStamp;

class AddNoteHandler implements MessageHandlerInterface
{
	private $notes;
	private $em;
	private $eventBus;

	public function __construct(
		NoteRepository $noteRepository,
		EntityManagerInterface $em,
		MessageBusInterface $eventBus
	) {
		$this->notes = $noteRepository;
		$this->em = $em;
		$this->eventBus = $eventBus;
	}

	public function __invoke(AddNote $command)
	{
		$noteId = $command->getId();
		$noteTitle = $command->getTitle();
		$noteDescription = $command->getDescription();

		if($this->notes->noteWithTitleExists($noteTitle)) {
			throw new \LogicException("Note title has to be unique");
		}

		$note = new Note($noteId);
		$note->setTitle($noteTitle);
		$note->setDescription($noteDescription);

		$this->em->persist($note);
		$this->em->flush();

		$event = new NoteCreated($noteId);
		$envelope = new Envelope($event);
		$this->eventBus->dispatch($envelope->with(new DispatchAfterCurrentBusStamp()));
	}
}