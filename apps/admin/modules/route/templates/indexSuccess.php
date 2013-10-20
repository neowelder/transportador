<h1>Routes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Origin</th>
      <th>Destination</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Routes as $Route): ?>
    <tr>
      <td><a href="<?php echo url_for('route/edit?id='.$Route->getId()) ?>"><?php echo $Route->getId() ?></a></td>
      <td><?php echo $Route->getOrigin() ?></td>
      <td><?php echo $Route->getDestination() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('route/new') ?>">New</a>
