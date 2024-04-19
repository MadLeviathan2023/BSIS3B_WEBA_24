<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <h1>Create Task</h1>
    <form action="<?= ROOT ?>/tasks/insert" method="POST">
        <label for="">Name: </label><input type="text" name="task_name"><br>
        <label for="">Description: </label><textarea name="task_description"></textarea><br>
        <label for="">Status: </label>
        <select name="task_status">
            <?php foreach($status as $item) { ?>
                <option value="<?= $item->status_name ?>"><?= $item->status_name ?></option>
            <?php } ?>
        </select><br>
        <label for="">Due Date: </label><input type="datetime-local" name="task_due"><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>