<?php

/**
 * route actions.
 *
 * @package    transportador
 * @subpackage route
 * @author     Your name here
 */
class routeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Routes = RoutePeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RouteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RouteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Route = RoutePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Route does not exist (%s).', $request->getParameter('id')));
    $this->form = new RouteForm($Route);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Route = RoutePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Route does not exist (%s).', $request->getParameter('id')));
    $this->form = new RouteForm($Route);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Route = RoutePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Route does not exist (%s).', $request->getParameter('id')));
    $Route->delete();

    $this->redirect('route/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Route = $form->save();

      $this->redirect('route/edit?id='.$Route->getId());
    }
  }
}
