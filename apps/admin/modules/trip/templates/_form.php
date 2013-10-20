<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('trip/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('trip/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'trip/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['route_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['route_id']->renderError() ?>
          <?php echo $form['route_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['driver_vehicle_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['driver_vehicle_id']->renderError() ?>
          <?php echo $form['driver_vehicle_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['price']->renderLabel() ?></th>
        <td>
          <?php echo $form['price']->renderError() ?>
          <?php echo $form['price'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['trip_time']->renderLabel() ?></th>
        <td>
          <?php echo $form['trip_time']->renderError() ?>
          <?php echo $form['trip_time'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['trip_start']->renderLabel() ?></th>
        <td>
          <?php echo $form['trip_start']->renderError() ?>
          <?php echo $form['trip_start'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
