<h1 class="page-header">Services</h1>
<h6>Double click text to edit in place</h6>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Icon</th>
            <th>Details</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($services['data'] as $service) { ?>
            <tr id="<?=$service->id; ?>">
                <td><?php if (isset($service->id)) echo htmlspecialchars($service->id, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <?php if (isset($service->image_url)) { ?>
                        <img src="../images/<?=$service->image_url; ?>" width="48">
                    <?php } ?>
                </td>
                <td>
                    <h4 class="title edit"><?php if (isset($service->title)) echo htmlspecialchars($service->title, ENT_QUOTES, 'UTF-8'); ?></h4>
                    <div class="edit"><?php if (isset($service->description)) echo htmlspecialchars($service->description, ENT_QUOTES, 'UTF-8'); ?></div>
                </td>
                <td><a href="<?php echo URL . 'services/delete/' . htmlspecialchars($service->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="glyphicon glyphicon-trash"></i> </a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
