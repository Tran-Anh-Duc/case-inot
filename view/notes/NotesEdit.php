<form action="" method="post">
<!--    <input type="text" name="id" placeholder="id" value="--><?//= $note['id'] ?><!--">-->
    <input type="text" name="title" placeholder="tiêu đề công việc" value="<?= $note['title'] ?>">
    <input type="text" name="content" placeholder="nôi dung công việc" value="<?= $note['content'] ?>">
    <input type="text" name="typeid" placeholder="loại công việc" value="<?= $note['typeid'] ?>">
    <input type="text" name="userid" placeholder="số thứ tự" value="<?= $note['userid'] ?>">
    <button type="submit">thay doi</button>
</form>

