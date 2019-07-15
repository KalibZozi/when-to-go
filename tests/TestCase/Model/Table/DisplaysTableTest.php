<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisplaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisplaysTable Test Case
 */
class DisplaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DisplaysTable
     */
    public $Displays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Displays',
        'app.Devices',
        'app.Stops',
        'app.Routes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Displays') ? [] : ['className' => DisplaysTable::class];
        $this->Displays = TableRegistry::getTableLocator()->get('Displays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Displays);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
