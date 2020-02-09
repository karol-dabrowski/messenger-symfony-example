<?php
namespace App\Controller;

use App\Command\AddNote;
use App\Query\GetSomething;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;

class NoteController extends AbstractController
{
	/**
	 * @Route("/note/add", methods={"POST"})
	 */
	public function add(Request $request, MessageBusInterface $commandBus)
	{
		$noteId = Uuid::uuid4();
		$noteTitle = $request->get("noteTitle");
		$noteDescription = $request->get("noteDescription");

		try {
			$commandBus->dispatch(
				new AddNote($noteId, $noteTitle, $noteDescription)
			);
		} catch (\Exception $e) {
			//TODO Handle exception
			dd($e->getMessage());
		}

		return $this->redirectToRoute('index');
	}

	/**
	 * @Route("/note/delete/{noteId}", methods={"POST"}, requirements={"noteId"="\d+"})
	 */
	public function delete(int $noteId)
	{
		dd($noteId);
		//TODO Delete note with id $noteId
	}
}