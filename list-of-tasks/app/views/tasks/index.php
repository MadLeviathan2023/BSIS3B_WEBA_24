<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new Link();
        $link->fontAwesome();
        $link->addStyle('tasks/index');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <h1>Tasks</h1>
    <a href="<?= ROOT ?>/tasks/create">Create New</a>
    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
        <?php if (is_array($tasks) && count($tasks) > 0) { ?>
            <?php foreach ($tasks as $task) { ?>
                <tr>
                    <td><?= $task->task_name ?></td>
                    <td><?= $task->task_description ?></td>
                    <td><?= $task->task_status ?></td>
                    <td><?= formattedDateTime($task->task_due); ?></td>
                    <td>
                        <a href="<?= ROOT ?>/tasks/edit/<?= $task->id ?>">Edit</a>
                        <span>|</span>
                        <a href="<?= ROOT ?>/tasks/delete/<?= $task->id ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">No Result</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>