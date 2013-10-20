<div class='row'>
  <div class='span12'>
  <a href="<?php echo url_for('vehicle_type/new') ?>" class='btn pull-right'>Agregar <b>Tipo de Vehiculo</b></a>
<h3>Tipos de Vehiculos</h3>
<?php if(count($VehicleTypes)>0):?>
<table class='table table-bordered'>
  <thead>
    <tr>
      <th></th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($VehicleTypes as $VehicleType): ?>
    <tr>
      <td><a href="<?php echo url_for('vehicle_type/edit?id='.$VehicleType->getId()) ?>">Ver</a></td>
      <td><?php echo $VehicleType->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif;?>
</div>
</div>