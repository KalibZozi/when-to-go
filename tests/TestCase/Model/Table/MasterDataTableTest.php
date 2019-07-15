<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterDataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterDataTable Test Case
 */
class MasterDataTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterDataTable
     */
    public $MasterData;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MasterData'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MasterData') ? [] : ['className' => MasterDataTable::class];
        $this->MasterData = TableRegistry::getTableLocator()->get('MasterData', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterData);

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
