<div class='row'>
  <div class='span12'>
  <a href="<?php echo url_for('driver/new') ?>" class='btn pull-right'>Agregar Conductor</a>
<h3>Conductores</h3>
<?php
    if(count($Drivers)==0){}else{
?>
<table class='table table-bordered'>
  <thead>
    <tr>
      <th></th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
    foreach ($Drivers as $Driver): ?>
    <tr>
      <td><a href="<?php echo url_for('driver/edit?id='.$Driver->getId()) ?>">VER</a></td>
      <td><?php echo $Driver->getName() ?></td>
      <td><?php echo $Driver->getLastname() ?></td>
      <td><?php echo $Driver->getPhone() ?></td>
    </tr>
    <?php endforeach;
  } ?>
  </tbody>
</table>

</div>
</div>