<?php

/**
 * driver_vehicle actions.
 *
 * @package    transportador
 * @subpackage driver_vehicle
 * @author     Your name here
 */
class driver_vehicleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->DriverVehicles = DriverVehiclePeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DriverVehicleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DriverVehicleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($DriverVehicle = DriverVehiclePeer::retrieveByPk($request->getParameter('id')), sprintf('Object DriverVehicle does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverVehicleForm($DriverVehicle);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($DriverVehicle = DriverVehiclePeer::retrieveByPk($request->getParameter('id')), sprintf('Object DriverVehicle does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverVehicleForm($DriverVehicle);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($DriverVehicle = DriverVehiclePeer::retrieveByPk($request->getParameter('id')), sprintf('Object DriverVehicle does not exist (%s).', $request->getParameter('id')));
    $DriverVehicle->delete();

    $this->redirect('driver_vehicle/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $DriverVehicle = $form->save();

      $this->redirect('driver_vehicle/edit?id='.$DriverVehicle->getId());
    }
  }
}
