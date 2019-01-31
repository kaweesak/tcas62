  <?php foreach($crud as $row) {?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->address; ?></td>
                <td>
                  <button class="btn btn-warning" onclick="editData('<?php echo $row->id; ?>','<?php echo $row->name; ?>','<?php echo $row->email; ?>','<?php echo $row->phone; ?>','<?php echo $row->address; ?>')"></button>
                  <button class="btn btn-danger" onclick="removeConfirm('<?php echo $row->id; ?>')"><i class="glyphicon glyphicon-remove"></i></button>
                </td>
              </tr>
    <?php } ?>
