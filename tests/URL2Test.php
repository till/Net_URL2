<?php
// Call Net_URL2Test::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "Net_URL2Test::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";
chdir(dirname(__FILE__) . '/../../');
require_once 'URL2.php';

/**
 * Test class for Net_URL2.
 * Generated by PHPUnit_Util_Skeleton on 2007-07-03 at 16:57:51.
 */
class Net_URL2Test extends PHPUnit_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("Net_URL2Test");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp() {
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {
    }

    /**
     * Test the getURL function.
     */
    public function testGetURL() {
        $n = new Net_URL2('http://www.example.com/');
        $this->assertEquals($n->getURL(),'http://www.example.com/');
        $n = new Net_URL2('/foo');
        $this->assertEquals($n->getURL(),'http://localhost/foo');
        $n = new Net_URL2('/?pear=fun');
        $this->assertEquals($n->getURL(),'http://localhost/?pear=fun');
        $n = new Net_URL2('?pear=fun');
        $this->assertEquals($n->getURL(),'http://localhost/'.$_SERVER['SCRIPT_FILENAME'].'?pear=fun');
    }

    /**
     * @todo Implement testAddQueryString().
     */
    public function testAddQueryString() {
        $n = new Net_URL2('http://www.example.com/');
        $n->addQueryString('pear','fun');
        $this->assertEquals($n->getURL(),'http://www.example.com/?pear=fun');
    }

    /**
     * Tests adding an array of querystring items.
     */
    public function testAddQueryStringArray() {
        $n = new Net_URL2('http://www.example.com/');
        $n->addQueryStringArray(array('pear'=>'fun'));
        $this->assertEquals($n->getURL(),'http://www.example.com/?pear=fun');
        $n->addQueryStringArray(array('pear'=>'fun for sure'));
        $this->assertEquals($n->getURL(),'http://www.example.com/?pear=fun%20for%20sure');
    }

    /**
     * Tests removeQueryString()
     */
    public function testRemoveQueryString() {
        $n = new Net_URL2('http://www.example.com/?name=david&pear=fun&fish=slippery');
        $n->removeQueryString('pear');
        $this->assertEquals($n->getURL(),'http://www.example.com/?name=david&fish=slippery');
        $n->removeQueryString('name');
        $this->assertEquals($n->getURL(),'http://www.example.com/?fish=slippery');
        $n->removeQueryString('fish');
        $this->assertEquals($n->getURL(),'http://www.example.com/');
    }

    /**
     * Tests removeQueryStringArray.
     */
    public function testRemoveQueryStringArray() {
        $n = new Net_URL2('http://www.example.com/?name=david&pear=fun&fish=slippery');
        $n->removeQueryStringArray(array('pear'));
        $this->assertEquals($n->getURL(),'http://www.example.com/?name=david&fish=slippery');
        $n->removeQueryStringArray(array('name','fish'));
        $this->assertEquals($n->getURL(),'http://www.example.com/');
    }

    /**
     * Tests adding a raw querystring.
     */
    public function testAddRawQueryString() {
        $n = new Net_URL2('http://www.example.com/');
        $n->addRawQueryString('flapdoodle');
        $this->assertEquals($n->getURL(),'http://www.example.com/?flapdoodle');
        $n->addRawQueryString('flapdoodle&dilly all day');
        $this->assertEquals($n->getURL(),'http://www.example.com/?flapdoodle&dilly%20all%20day');
        $n->addRawQueryString('like=this&like=that&like=this&uh');
        $this->assertEquals($n->getURL(),'http://www.example.com/?like=this&uh');
    }

    /**
     * Test getQueryString().
     */
    public function testGetQueryString() {
        $n = new Net_URL2('http://www.example.com/?foo');
        $this->assertEquals($n->getQueryString(),'foo');
        $n = new Net_URL2('http://www.example.com/?pear=fun&fruit=fruity');
        $this->assertEquals($n->getQueryString(),'pear=fun&fruit=fruity');
    }

    /**
     * Test setProtocol().
     */
    public function testSetProtocol() {
        $n = new Net_URL2('http://www.example.com/');
        $n->setProtocol('ftp');
        $this->assertEquals($n->getURL(),'ftp://www.example.com/');
        $n->setProtocol('gopher');
        $this->assertEquals($n->getURL(),'gopher://www.example.com/');
    }

    /**
     * Tests setting the anchor.
     */
    public function testSetAnchor() {
        $n = new Net_URL2('http://www.example.com/');
        $n->setAnchor('pear');
        $this->assertEquals($n->getURL(),'http://www.example.com/#pear');
    }

    /**
     * @todo Implement testResolvePath().
     */
    public function testResolvePath() {
        // Remove the following line when you implement this test.
        $this->markTestIncomplete(
          "This test has not been implemented yet."
        );
    }

    /**
     * Test the static function getStandardPort().
     */
    public function testGetStandardPort() {
        
        $this->assertEquals(Net_URL2::getStandardPort('ftp'),   21);
        $this->assertEquals(Net_URL2::getStandardPort('http'),  80);
        $this->assertEquals(Net_URL2::getStandardPort('https'), 443);
        $this->assertEquals(Net_URL2::getStandardPort('imap'),  143);
        $this->assertEquals(Net_URL2::getStandardPort('imaps'), 993);
        $this->assertEquals(Net_URL2::getStandardPort('pop3'),  110);
        $this->assertEquals(Net_URL2::getStandardPort('pop3s'), 995);
    }

    /**
     * @todo Implement testSetOption().
     */
    public function testSetOption() {
        // Remove the following line when you implement this test.
        $this->markTestIncomplete(
          "This test has not been implemented yet."
        );
    }

    /**
     * @todo Implement testGetOption().
     */
    public function testGetOption() {
        // Remove the following line when you implement this test.
        $this->markTestIncomplete(
          "This test has not been implemented yet."
        );
    }
}

// Call Net_URL2Test::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "Net_URL2Test::main") {
    Net_URL2Test::main();
}
?>
