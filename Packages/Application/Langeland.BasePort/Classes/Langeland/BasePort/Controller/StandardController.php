<?php
namespace Langeland\BasePort\Controller;

/*
 * This file is part of the Langeland.BasePort package.
 */

use TYPO3\Flow\Annotations as Flow;

class StandardController extends \TYPO3\Flow\Mvc\Controller\ActionController
{
    /**
     * @var \TYPO3\Flow\Security\Context
     * @Flow\Inject()
     */
    protected $securityContext;

    /**
     * @return void
     */
    public function indexAction()
    {
        $activeTokens = $this->securityContext->getAuthenticationTokens();
        /** @var $token \TYPO3\Flow\Security\Authentication\TokenInterface */
        foreach ($activeTokens as $token) {
            if ($token->isAuthenticated()) {
                $this->redirect('restricted');
            }
        }
    }

    /**
     * @return void
     */
    public function restrictedAction()
    {

    }

    /**
     * @return void
     */
    public function accessDeniedAction()
    {

    }
}
