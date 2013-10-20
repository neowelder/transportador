<h1>DriverVehicles List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Driver</th>
      <th>Vehicle</th>
      <th>Is active</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($DriverVehicles as $DriverVehicle): ?>
    <tr>
      <td><a href="<?php echo url_for('driver_vehicle/edit?id='.$DriverVehicle->getId()) ?>"><?php echo $DriverVehicle->getId() ?></a></td>
      <td><?php echo $DriverVehicle->getDriverId() ?></td>
      <td><?php echo $DriverVehicle->getVehicleId() ?></td>
      <td><?php echo $DriverVehicle->getIsActive() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('driver_vehicle/new') ?>">New</a>
