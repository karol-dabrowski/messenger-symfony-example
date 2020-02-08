<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	/**
	 * @Route("/")
	 */
	public function index()
	{
		//TODO Implement retrieving data
		$notes = [];

		return $this->render("index/index.html.twig", ["notes" => $notes]);
	}
}