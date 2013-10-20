<h1>Marks List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Marks as $Mark): ?>
    <tr>
      <td><a href="<?php echo url_for('mark/edit?id='.$Mark->getId()) ?>"><?php echo $Mark->getId() ?></a></td>
      <td><?php echo $Mark->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mark/new') ?>">New</a>
