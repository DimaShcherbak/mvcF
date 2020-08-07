<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="alert-warning"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']);}?></p>
                        <form action="/admin/banners/update/<?= $banner['id']?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" required type="text" value="<?= $banner['title'] ?>" name="title">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input class="form-control" required type="number" value="<?= $banner['position'] ?>" step="1" name="position">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input class="form-control" required type="text" value="<?= $banner['url'] ?>" name="url">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input class="form-control form-checkbox" type="checkbox" <?php if($banner['status'] == 1) echo 'checked'?>  name="status">
                            </div>
                            <div class="form-group">
                                <img src="/<?= $banner['image'] ?>" alt="Banner">
                                <label>Изображение</label>
                                <input class="form-control"  accept="image/*" type="file" name="image">
                                <input type="hidden" name="old_image" value="<?=$banner['image']?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Загрузить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>