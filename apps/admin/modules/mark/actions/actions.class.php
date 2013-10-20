<?php

/**
 * mark actions.
 *
 * @package    transportador
 * @subpackage mark
 * @author     Your name here
 */
class markActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Marks = MarkPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MarkForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MarkForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Mark = MarkPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Mark does not exist (%s).', $request->getParameter('id')));
    $this->form = new MarkForm($Mark);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Mark = MarkPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Mark does not exist (%s).', $request->getParameter('id')));
    $this->form = new MarkForm($Mark);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Mark = MarkPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Mark does not exist (%s).', $request->getParameter('id')));
    $Mark->delete();

    $this->redirect('mark/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Mark = $form->save();

      $this->redirect('mark/edit?id='.$Mark->getId());
    }
  }
}
