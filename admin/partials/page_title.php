<?php
$breadcrumbs = array(
    $title => dirname($_SERVER['PHP_SELF'])
);
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <?php foreach ($breadcrumbs as $page => $url) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= $url; ?>">หน้าหลัก</a>
                        </li>
                        <li class="breadcrumb-item active"><?= htmlspecialchars($page); ?></li>
                        <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    <?php } ?>
                </ol>
            </div>

        </div>
    </div>
</div>