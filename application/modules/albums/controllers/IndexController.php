<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $albums = new Albums_Model_DbTable_Albums();
        $this->view->albums = $albums->fetchAll();
    }

    public function gameAction()
    {

    }

    public function addAction()
    {
        $form = new Albums_Form_Album();
        $form->submit->setLabel('Add');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if ($form->isValid($formData)) {
                $artist = $form->getValue('artist');
                $title = $form->getValue('title');

                $albums = new Albums_Model_DbTable_Albums();
                $albums->addAlbum($artist, $title);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        $form = new Albums_Form_Album();
        $form->submit->setLabel('Save');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $artist = $form->getValue('artist');
                $title = $form->getValue('title');

                $albums = new Albums_Model_DbTable_Albums();
                $albums->updateAlbum($id, $artist, $title);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);

            if ($id > 0) {
                $albums = new Albums_Model_DbTable_Albums();
                $form->populate($albums->getAlbum($id));
            }
        }
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');

            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');

                $albums = new Albums_Model_DbTable_Albums();
                $albums->deleteAlbum($id);
            }

            $this->_helper->redirector('index');
        } else {
            $id = $this->getParam('id', 0);

            $albums = new Albums_Model_DbTable_Albums();
            $this->view->album = $albums->getAlbum($id);
        }
    }

    public function blogAction()
    {
        $info = new Blog_Model_Info();
        $this->view->blogInfo = $info->getInfo();
    }

    public function restsAction()
    {
        $server = new Rest_Model_Server();
        $this->view->restsInfo = $server->getInfo();
    }

    public function restcAction()
    {
        $client = new Rest_Model_Client();
        //$this->view->restcInfo = $client->getInfo();
        $this->view->restcInfo = $client->getInfoXml();
    }
}

