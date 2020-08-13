<div class="table-responsive dt-responsive">
    <table id="dom-jqry_wrapper" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ram Memory</th>
                <th>Storage Memory</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($storage)) {
                $i = 1;
                foreach ($storage as $storagedata) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $storagedata['ram'];?></td>
                        <td><?php echo $storagedata['storage'];?></td>
                        <td>
                            <a href="<?php echo base_url('storage/list/' . $storagedata['id']); ?>" data-toggle="tooltip" data-placement="top" class="btn btn-success" title="Edit Coupon Code">Edit <i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url('storage/delete-storage/' . $storagedata['id']); ?>" data-toggle="tooltip" data-placement="top" class="btn btn-success delete-item" title="Delete Coupon Code">Delete <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>