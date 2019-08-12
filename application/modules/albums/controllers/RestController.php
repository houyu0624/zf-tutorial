<?php

class RestController extends Zend_Rest_Controller
{
    public function init()
    {
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch->addActionContext('index', array('xml','json'))->initContext();

        //$this->_helper->viewRenderer->setNeverRender();
        $this->view->success = "true";
        $this->view->version = "1.0"; //hard-coded for now.
    }

    /**
     * The index action handles index/list requests; it should respond with a
     * list of the requested resources.
     */
    public function indexAction()
    {
        //if you want to have access to a particular paramater use the helper function as follows:
        //print $this->_helper->getParam('abc');
        //To test with this use:  http://www.canadayu.com/albums/rest/index/format/xml/abc/1002

    }

    /**
     * The list action is the default for the rest controller
     * Forward to index
     */
    public function listAction()
    {
        $this->forward('index');
    }

    /**
     * Show the new request
     */
    public function newAction() {
        $this->forward('index');
    }

    /**
     * Show the edit book form. Url format: /version/edit/2
     */
    public function editAction() {
        $this->forward('index');
    }

    /**
     * The get action handles GET requests and receives an 'id' parameter; it
     * should respond with the server resource state of the resource identified
     * by the 'id' value.
     */
    public function getAction()
    {
        $this->forward('index');
    }

    /**
     * The post action handles POST requests; it should accept and digest a
     * POSTed resource representation and persist the resource state.
     */
    public function postAction() {
        $this->forward('index');
    }

    /**
     * The put action handles PUT requests and receives an 'id' parameter; it
     * should update the server resource state of the resource identified by
     * the 'id' value.
     */
    public function putAction() {
        $this->forward('index');
    }

    /**
     * The delete action handles DELETE requests and receives an 'id'
     * parameter; it should update the server resource state of the resource
     * identified by the 'id' value.
     */
    public function deleteAction() {
        $this->forward('index');
    }

    public function headAction() {
        $this->forward('index');
    }
}
