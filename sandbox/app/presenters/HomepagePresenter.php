<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 * @persistent(gray1)
 */
class HomepagePresenter extends BasePresenter
{

	public function createComponentGray1()
	{
		return new \GrayControl;
	}

	public function createComponentGray2()
	{
		return new \GrayControl;
	}

	function createComponentMulti()
	{
		return new Nette\Application\UI\Multiplier(function($id) {
			return new \GrayControl;
		});
	}

	function createComponentComment()
	{
		$comment = new \CommentControl;
		$comment->onDelete[] = function() {
			$this->redirect('default');
		};
		return $comment;
	}

}
