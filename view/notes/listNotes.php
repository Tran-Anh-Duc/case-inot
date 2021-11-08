<div class="container">
    <div class="card" >
        <h5 style="text-align: center" class="card-title btn btn-warning" type="button" >Notes</h5>
        <div class="card-body">
<a   href="index.php?page=notes-add">
    <button style="width: 200px" type="button" class="btn btn-primary btn-lg mt-3 mb-3 p-2">Add</button>
</a>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Title</th>
        <th>Content</th>
        <th>Type_id</th>
        <th>User_id</th>
        <th colspan="2">action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($notes)): ?>
        <?php foreach ($notes as $note): ?>
            <tr>
                <td><?= $note['id'] ?></td>
                <td><img width="150" src="<?= $note['image'] ?>" ></td>
                <td><?= $note['title'] ?></td>
                <td><?= $note['content'] ?></td>
                <td><?= $note['typeid'] ?></td>
                <td><?= $note['userid'] ?></td>
                <td><a onclick="return confirm('are you sure')"
                       type="button" class="btn btn-danger" href="index.php?page=notes-delete&id=<?php echo $note["id"] ?>">Delete</a></td>
                <td><a type="button" class="btn btn-success" href="index.php?page=notes-edit&id=<?php echo $note["id"] ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">không có note nào ở đây</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
        </div>
    </div>
</div>

