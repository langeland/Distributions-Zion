<?php
namespace Langeland\BasePort\Controller;

/*
 * This file is part of the Langeland.BasePort package.
 */

use TYPO3\Flow\Annotations as Flow;

class AuthenticationController extends \Hfrahmann\Opauth\Controller\AbstractAuthenticationController
{
    /**
     * @var \TYPO3\Flow\Security\AccountRepository
     * @Flow\Inject
     */
    protected $accountRepository;

    /**
     * @param \TYPO3\Flow\Mvc\ActionRequest $originalRequest The request that was intercepted by the security framework, NULL if there was none
     * @return string
     */
    protected function onAuthenticationSuccess(\TYPO3\Flow\Mvc\ActionRequest $originalRequest = null)
    {
        // opauthResponseData contains the raw data of the Opauth response
        $opauthResponseData = $this->opauthResponse;
        if ($originalRequest !== null) {
            $this->redirectToRequest($originalRequest);
        }
        $this->redirect('index', 'Standard', 'Langeland.BasePort');
    }

    /**
     * @param array $opauthResponseData Opauth Response with all sent data
     * @param \TYPO3\Flow\Security\Account $opauthAccount A pre-generated account with the Opauth data
     * @return void
     */
    public function onOpauthAccountDoesNotExist(array $opauthResponseData, \TYPO3\Flow\Security\Account $opauthAccount)
    {
        $this->accountRepository->add($opauthAccount);
        $this->persistenceManager->persistAll();
        // Add the account to TYPO3 Flow Account Repository.

        $this->authenticateAction(); // authenticate again
    }

    /**
     * This method is called when the authentication was cancelled or another problem occurred at the provider.
     *
     * @param array $opauthResponseData
     * @return void|string
     */
    public function onOpauthAuthenticationFailure(array $opauthResponseData)
    {
        return 'Opauth Authentication Canceled';
    }

    /**
     * Logs all active tokens out.
     *
     * @return void
     */
    public function logoutAction()
    {
        $this->authenticationManager->logout();
        $this->redirect('index', 'Standard', 'Langeland.BasePort');
    }
}
