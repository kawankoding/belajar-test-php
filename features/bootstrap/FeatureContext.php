<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

	/**
     * @BeforeSuite
     */
    public static function prepare(BeforeSuiteScope $scope)
    {
        $app = require_once __DIR__ . '/../../config/app.php';
        $app->getContainer()['db']->exec('DELETE FROM products');
    }

    /**
     * @Given I am on admin dashboard
     */
    public function iAmOnAdminDashboard()
    {
        $this->visitPath('/admin');
    }
}
