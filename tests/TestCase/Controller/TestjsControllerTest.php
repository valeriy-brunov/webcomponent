<?php
declare(strict_types=1);

namespace Webcomponent\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Webcomponent\Controller\TestjsController;

/**
 * Webcomponent\Controller\TestjsController Test Case
 *
 * @uses \Webcomponent\Controller\TestjsController
 */
class TestjsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.Webcomponent.Testjs',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \Webcomponent\Controller\TestjsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \Webcomponent\Controller\TestjsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \Webcomponent\Controller\TestjsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \Webcomponent\Controller\TestjsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \Webcomponent\Controller\TestjsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
