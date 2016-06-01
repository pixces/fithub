<div class="container">
    <!-- main content output -->
    <h2>Portfolio: Album</h2>
    <h3>To Edit: Click on Title / Description.</h3>
    <div class="box row">
        <div id="addAlbum" class="form col-lg-4">
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
                <input type="submit" class="btn btn-default" name="submit_add_album" value="Submit" />
            </form>
        </div>
        <div id="displayAlbum" class="display form col-lg-8">
            <?php foreach ($albums['data'] as $album){?>
            <div id="albumItem" class="col-lg-3 album-Item">
                <img class="img-responsive" src="<?=URL . "../images/portfolio/thumb/tn_" . $album->image_url; ?>">
                <div class="album-meta">
                    <span class="title"><?=$album->title; ?></span>
                    <span class="category"><i class="glyphicon glyphicon-tag"></i> <?=$album->category; ?></span>
                    <span><a href="portfolio/album/<?=$album->id; ?>">Add Images</a></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
