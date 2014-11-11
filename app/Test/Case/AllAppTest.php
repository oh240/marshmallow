<?php

class AllAppTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All Application Test');
        //$suite->addTestDirectory(TESTS . 'Case/View');
        $suite->addTestDirectory(TESTS . 'Case/Model');
        //$suite->addTestDirectory(TESTS . 'Case/Selenium');
        return $suite;
    }
}