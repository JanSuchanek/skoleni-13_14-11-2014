<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	function __construct($path, \FormFactory $ff)
	{
		dump($ff->create());
	}

	function inject()
	{
		//dump($this->getUser());

	}

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}

