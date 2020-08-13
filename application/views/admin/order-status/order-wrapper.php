<div class="table-responsive dt-responsive">
    <table id="dom-jqry_wrapper" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($order_staus)) {
                $i = 1;
                foreach ($order_staus as $status) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $status['order_status'];?></td>
                        <td>
                            <a href="<?php echo base_url('admin/order-status/edit/' . $status['id']); ?>" data-toggle="tooltip" data-placement="top" class="btn btn-success" title="Edit Order status"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url('admin/order-status/delete/' . $status['id']); ?>" data-toggle="tooltip" data-placement="top" class="btn btn-danger delete-item" title="Delete Order Status"><i class="fa fa-trash"></i></a>
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