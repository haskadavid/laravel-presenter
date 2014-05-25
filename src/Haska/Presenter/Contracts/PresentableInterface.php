<?php namespace Haska\Presenter\Contracts;

interface PresentableInterface {

	/**
	 * Prepare a new or cached presenter instance
	 *
	 * @return mixed
	 */
	public function present();

} 