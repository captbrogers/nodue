<?php

namespace OCA\Nodue\Tests\Unit\Controller;

use OCA\Nodue\Controller\MainController;
use OCP\AppFramework\Http\TemplateResponse;
use PHPUnit_Framework_TestCase;

class MainControllerTest extends PHPUnit_Framework_TestCase
{
    private $controller;
    private $userId = 'john';

    public function setUp()
    {
        $request = $this->getMockBuilder('OCP\IRequest')->getMock();

        $this->controller = new MainController('nodue', $request, $this->userId);
    }

    public function testIndex()
    {
        $result = $this->controller->index();

        $this->assertEquals('index', $result->getTemplateName());
        $this->assertTrue($result instanceof TemplateResponse);
    }
}
