<div class="container">
    <div class="row">
        <div class="col-sm">
            <p class="alert-warning"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']);}?></p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">position</th>
                            <th scope="col">status</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <?php /** @var array $banners */ ?>
                        <?php foreach ($banners as $banner): ?>
                            <tr>
                                <td><?php echo $banner['id'] ?></td>
                                <td><?php echo $banner['title'] ?></td>
                                <td>
                                    <a href="/admin/banners/down/<?php echo $banner['id']?>">&darr;</a>
                                    <?php echo $banner['position'] ?>
                                    <a href="/admin/banners/up/<?php echo $banner['id']?>">&uarr;</a>
                                </td>
                                <td><?php if($banner['status'])echo 'enable'; else echo 'disable'; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="/admin/banners/edit/<?php echo $banner['id'] ?>" title="Edit">Edit</a>
                                    <form action="/admin/banners/delete" method="post">
                                        <input type="hidden" name="bannerId" value="<?php echo $banner['id'] ?>">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
