<h1 class="page-header">Portfolio <span class="small">Albums</span></h1>
<div class="well">
    <div class="media">
        <div class="pull-left">
            <img class="img-responsive img-thumbnail" src="<?=URL . "../images/portfolio/thumb/tn_" . $album->image_url; ?>" width="125">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?=$album->title; ?></h4>
            <span><?=$album->description; ?></span>
            <span>Images: <?=$images['count']; ?></span>
            <?=$album->category; ?>
            <div>
                <span><a href="<?=URL . 'portfolio'; ?>">Back to Albums</a></span>
            </div>
        </div>
    </div>
</div>
<div class="well upload-form">
    <h3>Add / Upload Images. </h3>
    <form class="form-inline" method="post" enctype="multipart/form-data" action="<?=URL . 'portfolio/addImage'; ?>">
        <input type="hidden" name="parent_id" value="<?=$album->id; ?>">
        <div class="form-group">
            <label class="sr-only" for="file">Select & Upload</label>
            <input type="file" class="form-control" id="file" name="images[]" required multiple>
        </div>
        <div class="form-group">
            <label class="sr-only" for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Common title" size="100">
        </div>
        <input type="submit" class="btn btn-primary" name="submit_add_image" value="Submit" />
    </form>
</div>
<div class="box">
    <div class="row image-display">
        <?php foreach ($images['data'] as $image){?>
            <div id="albumItem" class="col-md-2 col-sm-3 col-xs-6 album-Item">
                <img class="img-responsive img-thumbnail" src="<?=URL . "../images/portfolio/thumb/tn_" . $image->image_url; ?>">
                <div class="album-meta">
                    <span class="title"><?=$image->title; ?></span>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
