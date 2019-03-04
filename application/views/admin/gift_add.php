<title>Gift Item</title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gift Item</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Add Gift</h2>
                </header>

                <div class="panel-body">
                    <form id="gift" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/gift/save">

                        <div class="form-group">
                            <div class="col-md-6">
                                <label><strong>Title</strong></label>
                                <input type="text" class="form-control input-sm mb-md" name="title" id="title" placeholder="Enter gift title">
                            </div>
                            <div class="col-md-6">
                                <label><strong>Price</strong></label>
                                <input type="number" class="form-control input-sm mb-md" name="price" id="price" placeholder="Enter gift price">
                            </div>

                            <div class="col-md-12">
                                <label><strong>Description</strong></label>
                                <textarea class="form-control input-sm mb-md" rows="5" name="description" id="description" placeholder="Enter gift description"></textarea>
                            </div>
                            
                            <div class="col-md-3">
                                <label><strong>Image</strong></label>
                                <input type="file" class="form-control input-sm mb-md" name="image" id="image">
                            </div>

                            <div class="col-md-3">
                                <label><strong>Is this featured gift?</strong></label>
                                <select name="featured" id="featured" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                            </div>
                            <div class="col-md-3">
                                <br />
                                <button class="btn btn-primary">Submit</button>
                                <a href="" class="btn btn-default" type="button">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>

</section>
