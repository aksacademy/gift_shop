<title>Deliverable Pincode | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Deliverable Pincode</h2>

    </header>
    <?php if ($this->session->flashdata('msg') != null) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
        </div>


        <?php
    } else if ($this->session->flashdata('err') != null) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo $this->session->flashdata('err'); ?></strong>
        </div>    

        <?php
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Add Pincode</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" id="pincodeForm" method="post" action="<?php echo base_url() ?>admin/deliverable_pincode/save">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="number" class="form-control input-sm mb-md" name="pincode" placeholder="Enter pincode">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Deliverable Pincode List</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Pincode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 1;
                    foreach ($deliverable_pincode as $dp) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $srno; ?></td>
                            <td><?php echo $dp->pincode; ?>
                            </td>
                            <td class="actions">
                                <a href="<?php echo base_url() ?>admin/deliverable_pincode/edit?id=<?php echo $dp->pincode_id ?>"><i class="fa fa-pencil"></i></a>
                                <a onclick="return confirm('Do you really want to delete this record?')" href="<?php echo base_url() ?>admin/deliverable_pincode/delete?id=<?php echo $dp->pincode_id ?>"><i class="fa fa-trash-o"></i></a>
                            </td>

                        </tr>
                        <?php
                        $srno++;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </section>
</section>

<script>
    $(document).ready(function () {
        $('#pincodeForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                pincode: {
                    validators: {
                        notEmpty: {
                            message: 'The pincode is required'
                        },
                        remote: {
                            url: '<?php echo base_url() ?>admin/deliverable_pincode/unique',
                            type: 'post',
                            data: {
                                pincode_id: 0,
                            },
                            message: 'This pincode already exists'
                        }
                    }
                }
            }
        });
    });
</script>