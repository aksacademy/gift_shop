<title>Gift Category</title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gift Category</h2>
    </header>

    <!-- start: page -->

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Gift Category for <?php echo $gift->title ?></h2>
                </header>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="dd" id="nestable">
                            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/gift/save_category">
                                <input type="hidden" name="gift_id" value="<?php echo $gift->gift_id ?>" />
                                <ol class="dd-list">

                                    <?php
                                    foreach ($menu as $m) {
                                        ?>
                                        <li class="dd-item" data-id="2">

                                            <div class="checkbox-custom checkbox-default" style="margin-top: 10px">
                                                <input type="checkbox" disabled="">
                                                <label><?php echo $m->menu_name; ?></label>
                                            </div>

                                            <?php
                                            foreach ($category as $c) {
                                                if ($m->menu_id == $c->menu_id) {
                                                    ?>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" sty>

                                                            <div class="checkbox-custom checkbox-default" style="margin-top: 10px">
                                                                <input type="checkbox" disabled="">
                                                                <label><?php echo $c->category_name; ?></label>
                                                            </div>    


                                                            <ol class="dd-list">
                                                                <li>
                                                                    <?php
                                                                    foreach ($sub_category as $sc) {
                                                                        if ($c->category_id == $sc->category_id) {
                                                                            ?>
                                                                            <div class="checkbox-custom checkbox-default" style="margin-top: 10px">
                                                                                <?php
                                                                                if (in_array($sc->sub_category_id, array_column($gift_category, 'sub_category_id'))) {
                                                                                    ?>
                                                                                    <input checked="" type="checkbox" name="category[]" value="<?php echo $m->menu_id . ',' . $c->category_id . ',' . $sc->sub_category_id ?>">
                                                                                    <label><?php echo $sc->sub_category_name ?></label>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <input type="checkbox" name="category[]" value="<?php echo $m->menu_id . ',' . $c->category_id . ',' . $sc->sub_category_id ?>">
                                                                                    <label><?php echo $sc->sub_category_name ?></label>
                                                                                    <?php
                                                                                }
                                                                                ?>

                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </li>
                                                            </ol>
                                                        </li>

                                                    </ol>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ol>

                                <br />
                                <button type="submit" class="btn btn-primary">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
