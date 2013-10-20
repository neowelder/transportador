<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('vehicle/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('vehicle/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'vehicle/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['image']->renderLabel() ?></th>
        <td>
          <?php echo $form['image']->renderError() ?>
          <?php echo $form['image'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mark_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['mark_id']->renderError() ?>
          <?php echo $form['mark_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vechicle_type_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['vechicle_type_id']->renderError() ?>
          <?php echo $form['vechicle_type_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['model']->renderLabel() ?></th>
        <td>
          <?php echo $form['model']->renderError() ?>
          <?php echo $form['model'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['plate']->renderLabel() ?></th>
        <td>
          <?php echo $form['plate']->renderError() ?>
          <?php echo $form['plate'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['capacity']->renderLabel() ?></th>
        <td>
          <?php echo $form['capacity']->renderError() ?>
          <?php echo $form['capacity'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
