<?php

namespace OCA\Nodue\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;

class MainController extends Controller
{
    private $userId;

    /**
     * MainController constructor.
     *
     * @param string        $appName
     * @param \OCP\IRequest $request
     * @param string        $userId
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return void
     */
    public function __construct(string $appName, IRequest $request, string $userId)
    {
        parent::__construct($appName, $request);
        $this->userId = $userId;
    }

    /**
     * The "home" page of this app.
     *
     * CAUTION: the @Stuff turns off security checks; for this page no admin is
     *          required and no CSRF check. If you don't know what CSRF is, read
     *          it up in the docs or you might create a security hole. This is
     *          basically the only required method to add this exemption, don't
     *          add it to any other method if you don't exactly know what it does
     *
     * @NoAdminRequired
     * @NoCSRFRequired
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\TemplateResponse
     */
    public function index(): TemplateResponse
    {
        return new TemplateResponse('nodue', 'index');
    }
}
