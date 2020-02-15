<?php
namespace App\Query\Handler;

use App\Query\GetAllNotes;
use App\Repository\NoteRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetAllNotesHandler implements MessageHandlerInterface
{
	private $notes;

	public function __construct(NoteRepository $noteRepository)
	{
		$this->notes = $noteRepository;
	}

	public function __invoke(GetAllNotes $query)
	{
		return $this->notes->findAll();
	}
}