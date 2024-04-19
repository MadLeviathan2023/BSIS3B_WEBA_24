<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new Link();
        $link->fontAwesome();
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <h1>Tasks</h1>
    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tasks as $task) { ?>
            <tr>
                <td><?= $task->task_name ?></td>
                <td><?= $task->task_description ?></td>
                <td><?= $task->task_status ?></td>
                <td><?= $task->task_due ?></td>
                <td>
                    <a href="<?= ROOT ?>/tasks/edit">Edit</a>
                    <span>|</span>
                    <a href="<?= ROOT ?>/tasks/delete">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>