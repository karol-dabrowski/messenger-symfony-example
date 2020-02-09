<?php
namespace App\Command\Handler;

use App\Command\AddNote;
use App\Entity\Note;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class AddNoteHandler implements MessageHandlerInterface
{
	private $notes;
	private $em;

	public function __construct(NoteRepository $noteRepository, EntityManagerInterface $em)
	{
		$this->notes = $noteRepository;
		$this->em = $em;
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
	}
}