<h1>Vehicles List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Image</th>
      <th>Mark</th>
      <th>Vechicle type</th>
      <th>Model</th>
      <th>Plate</th>
      <th>Capacity</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Vehicles as $Vehicle): ?>
    <tr>
      <td><a href="<?php echo url_for('vehicle/edit?id='.$Vehicle->getId()) ?>"><?php echo $Vehicle->getId() ?></a></td>
      <td><?php echo $Vehicle->getImage() ?></td>
      <td><?php echo $Vehicle->getMark()->getName() ?></td>
      <td><?php echo $Vehicle->getVechicleTypeId() ?></td>
      <td><?php echo $Vehicle->getModel() ?></td>
      <td><?php echo $Vehicle->getPlate() ?></td>
      <td><?php echo $Vehicle->getCapacity() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('vehicle/new') ?>">New</a>
