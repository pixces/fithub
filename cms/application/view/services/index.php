<div class="container">
    <!-- main content output -->
    <h2>Services</h2>
    <h3>To Edit: Click on Title / Description.</h3>
    <div class="box">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Icon</td>
                <td>Details</td>
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
                        <div class="title edit"><?php if (isset($service->title)) echo htmlspecialchars($service->title, ENT_QUOTES, 'UTF-8'); ?></div>
                        <div class="edit"><?php if (isset($service->description)) echo htmlspecialchars($service->description, ENT_QUOTES, 'UTF-8'); ?></div>
                    </td>
                    <!-- td><a href="<?php echo URL . 'services/delete/' . htmlspecialchars($service->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td -->
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
