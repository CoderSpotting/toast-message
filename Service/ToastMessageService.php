<?php

namespace CoderSpotting\Bundle\ToastMessageBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ToastMessageService
{
	const SERVICE_NAME = 'CoderSpotting.ToastMessage';

	use ContainerAwareTrait;

	public function __construct(ContainerInterface $container)
	{
		$this->setContainer($container);
	}

	public function addLogToast($message)
	{
		$this->addToast('log', $message);
	}

	public function addSuccessToast($message)
	{
		$this->addToast('success', $message);
	}

	public function addErrorToast($message)
	{
		$this->addToast('error', $message);
	}

	private function addToast($toastType, $message)
	{
		$toast = new ToastMessage();

		$toast->setToastType($toastType);
		$toast->setMessage($message);

		$this->addToastToSession($toast);
	}

	private function addToastToSession(ToastMessage $toastMessage)
	{
		$session = $this->container->get('session');

		$toasts = $session->get('CoderSpotting_ToastMessages');

		if (!isset($toasts))
		{
			$toasts = array();
		}

		$toasts[] = $toastMessage;

		$session->set('CoderSpotting_ToastMessages', $toasts);

		return $this;
	}

	public function getToasts()
	{
		$session = $this->container->get('session');

		$toasts = $session->get('CoderSpotting_ToastMessages');

        if (!isset($toasts))
        {
        	$toasts = array();
        }

        return $toasts;
	}

	public function resetToasts()
	{
		$session = $this->container->get('session');

		$session->remove('CoderSpotting_ToastMessages');

		return $this;
	}
}