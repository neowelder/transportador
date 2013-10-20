<h1>Trips List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Route</th>
      <th>Driver vehicle</th>
      <th>Price</th>
      <th>Trip time</th>
      <th>Trip start</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Trips as $Trip): ?>
    <tr>
      <td><a href="<?php echo url_for('trip/edit?id='.$Trip->getId()) ?>"><?php echo $Trip->getId() ?></a></td>
      <td><?php echo $Trip->getRouteId() ?></td>
      <td><?php echo $Trip->getDriverVehicleId() ?></td>
      <td><?php echo $Trip->getPrice() ?></td>
      <td><?php echo $Trip->getTripTime() ?></td>
      <td><?php echo $Trip->getTripStart() ?></td>
      <td><?php echo $Trip->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('trip/new') ?>">New</a>
