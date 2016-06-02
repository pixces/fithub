<h1 class="page-header">Portfolio</h1>
<div class="box row">
    <div id="addAlbumForm" class="form col-md-4 col-sm-6">
        <form method="post" action="<?=URL . 'portfolio/addAlbum'; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Album Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Album Title/Name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category" required>
                    <option value="">-- Select Album Category --</option>
                    <?php foreach($categories['data'] as $category){ ?>
                    <option value="<?=$category->id; ?>"><?=$category->title; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Ablbum Image</label>
                <input type="file" id="image" name="image" required>
            </div>
            <input type="submit" class="btn btn-primary" name="submit_add_album" value="Submit" />
        </form>
    </div>
    <div id="displayAlbum" class="display form col-md-8 col-sm-6">
        <?php foreach ($albums['data'] as $album){?>
        <div id="albumItem" class="col-md-3 col-sm-6 album-Item">
            <img class="img-responsive img-thumbnail" src="<?=URL . "../images/portfolio/thumb/tn_" . $album->image_url; ?>">
            <div class="album-meta">
                <span class="title"><?=$album->title; ?></span>
                <span class="category text-muted"><?=$album->category; ?></span>
                <span>
                    <a href="portfolio/album/<?=$album->id; ?>"><i class="glyphicon glyphicon-picture" alt="Add Images"></i> Manage Images</a>
                    <!-- a href="portfolio/albumDelete/<?=$album->id; ?>"><i class="glyphicon glyphicon-trash" alt="Delete Album"></i> </a -->
                </span>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
