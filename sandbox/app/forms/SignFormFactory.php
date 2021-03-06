<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
	Nette\Security\User;


class SignFormFactory extends Nette\Object
{
	/** @var User */
	private $user;


	public function __construct(User $user)
	{
		$this->user = $user;
	}


	/**
	 * @return Form
	 */
	public function create()
	{
		Nette\Object::extensionMethod(
			'Nette\Forms\Container::addDate',
			function($form, $name, $label = NULL) {
				$form[$name] = new \DateInput($label);
			}
		);

		$form = new Form;
		$form->addGroup('skupina');
		$form->addText('username', 'Username:')
			->setRequired('Please enter your username.');

		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');

		//$form->addComponent(new \DateInput, 'date');
		//$form['date'] = new \DateInput('Datum:');
		$form->addDate('date', 'Datum:');

		$form->addCheckbox('remember', 'Keep me signed in');

		$form->addSubmit('send', 'Sign in');


		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}


	public function formSucceeded($form, $values)
	{
		dump($values);
	}

}
