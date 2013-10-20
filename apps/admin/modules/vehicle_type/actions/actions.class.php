<?php

/**
 * vehicle_type actions.
 *
 * @package    transportador
 * @subpackage vehicle_type
 * @author     Your name here
 */
class vehicle_typeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->VehicleTypes = VehicleTypePeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VehicleTypeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VehicleTypeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($VehicleType = VehicleTypePeer::retrieveByPk($request->getParameter('id')), sprintf('Object VehicleType does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehicleTypeForm($VehicleType);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($VehicleType = VehicleTypePeer::retrieveByPk($request->getParameter('id')), sprintf('Object VehicleType does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehicleTypeForm($VehicleType);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($VehicleType = VehicleTypePeer::retrieveByPk($request->getParameter('id')), sprintf('Object VehicleType does not exist (%s).', $request->getParameter('id')));
    $VehicleType->delete();

    $this->redirect('vehicle_type/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $VehicleType = $form->save();

      $this->redirect('vehicle_type/edit?id='.$VehicleType->getId());
    }
  }
}
