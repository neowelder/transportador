<h1>Drivers List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Lastname</th>
      <th>Phone</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Drivers as $Driver): ?>
    <tr>
      <td><a href="<?php echo url_for('driver/edit?id='.$Driver->getId()) ?>"><?php echo $Driver->getId() ?></a></td>
      <td><?php echo $Driver->getName() ?></td>
      <td><?php echo $Driver->getLastname() ?></td>
      <td><?php echo $Driver->getPhone() ?></td>
      <td><?php echo $Driver->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('driver/new') ?>">New</a>
