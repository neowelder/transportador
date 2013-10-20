<?php

/**
 * driver actions.
 *
 * @package    transportador
 * @subpackage driver
 * @author     Your name here
 */
class driverActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Drivers = DriverPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DriverForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DriverForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Driver = DriverPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Driver does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverForm($Driver);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Driver = DriverPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Driver does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverForm($Driver);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Driver = DriverPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Driver does not exist (%s).', $request->getParameter('id')));
    $Driver->delete();

    $this->redirect('driver/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Driver = $form->save();

      $this->redirect('driver/edit?id='.$Driver->getId());
    }
  }
}
