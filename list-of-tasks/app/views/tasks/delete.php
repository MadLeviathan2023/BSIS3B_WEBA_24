<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <h1>Task Deletion</h1>
    <form action="<?= ROOT ?>/tasks/remove" method="POST">
        <label for="">Name: </label><input type="text" name="task_name" value="<?= $task->task_name ?>" disabled><br>
        <label for="">Description: </label><textarea name="task_description" disabled><?= $task->task_description ?></textarea><br>
        <label for="">Status: </label>
        <select name="task_status" disabled>
            <?php foreach($status as $item) { ?>
                <option value="<?= $item->status_name ?>" <?= $item->status_name == $task->task_status ? 'selected' : '' ?>><?= $item->status_name ?></option>
            <?php } ?>
        </select><br>
        <label for="">Due Date: </label><input type="datetime-local" name="task_due" value="<?= $task->task_due ?>" disabled><br>
        <input type="hidden" name="id" value="<?= $task->id ?>">
        <input type="submit" value="Delete">
    </form>
</body>
</html>