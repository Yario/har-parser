<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/app.css">
    <title>.HAR Parser</title>
</head>
<body>
<div class="main">
    <div class="box">
        <form action="./index.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <label for="basehost">Base domain (e.g <strong>hfnewcorp.org</strong>)</label>
                <input type="text" class="input" id="basehost" name="basehost" required>
            </div>
            <div class="row">
                <label for="har_file">.HAR file</label>
                <input type="file" class="input" id="har_file" name="har_file[]" required multiple>
            </div>
            <div class="row">
                <label for="full">
                    <span>Show full URL</span>
                    <input type="checkbox" id="full" name="full_view_url">
                </label>
            </div>
            <div class="submit-row">
                <button type="submit" class="button">Submit</button>
            </div>
        </form>

        <?php require_once('./action.php'); ?>

    </div>
</div>
</body>
</html>