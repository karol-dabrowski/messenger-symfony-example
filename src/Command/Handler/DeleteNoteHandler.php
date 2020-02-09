<?php
namespace App\Command\Handler;

use App\Command\DeleteNote;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DeleteNoteHandler implements MessageHandlerInterface
{
	private $notes;
	private $em;

	public function __construct(NoteRepository $noteRepository, EntityManagerInterface $em)
	{
		$this->notes = $noteRepository;
		$this->em = $em;
	}

	public function __invoke(DeleteNote $command)
	{
		$noteId = $command->getId();
		$note = $this->notes->findOneById($noteId);

		if(!$note) {
			throw new \InvalidArgumentException("Note with provided id does not isset");
		}

		$this->em->remove($note);
	}
}