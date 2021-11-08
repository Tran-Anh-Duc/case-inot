
<div class="container">
    <div class="card" >
        <h5 style="text-align: center" class="card-title btn btn-warning" type="button" >Note-Type</h5>
        <div class="card-body">
<!--            <a href="index.php?page=note-add" ><button style="width: 200px" type="button" class="btn btn-primary btn-lg mt-3 mb-3 p-2 ">Add-Note-Type</button> </a>-->
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>User_id</th>
                    <th>Image</th>

<!--                    <th colspan="2">action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php if (isset($noteViews)): ?>
                    <?php foreach ($noteViews as $noteView): ?>
                        <tr>
                            <td><?= $noteView['id'] ?></td>
                            <td><?= $noteView['title'] ?></td>
                            <td><?= $noteView['content'] ?></td>
                            <td><?= $noteView['userid'] ?></td>
                            <td><?= $noteView['image'] ?></td>
<!--                            <td><a  onclick="return confirm('are you sure')"-->
<!--                                    type="button" class="btn btn-outline-danger" href="index.php?page=note-delete&id=--><?php //echo $noteType["id"] ?><!--">Delete</a></td>-->
<!--                            <td><a type="button" class="btn btn-outline-success" href="index.php?page=note-edit&id=--><?php //echo $noteType["id"] ?><!--">Edit</a></td>-->
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">không có note nào ở đây</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

