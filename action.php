<?php
if (!empty($_FILES) && isset($_POST['basehost'])) {
    $urlsResult = [];
    $baseHost = $_POST['basehost'];
    $fullViewUrl = $_POST['full_view_url'];

    foreach ($_FILES as $files) {

        foreach ($files['name'] as $file) {
            $fileExt = end((explode(".", $file)));

            if ($fileExt !== 'har') {
                echo '<div class="error">Invalid file format</div>';
                die();
            }
        }

        foreach ($files['tmp_name'] as $file) {
            if (file_exists($file)) {

                $fileData = json_decode(file_get_contents($file), true);

                foreach ($fileData['log']['entries'] as $entry) {
                    $url = parse_url($entry['request']['url']);
                    if ($url['host'] !== $baseHost) {
                        if ($fullViewUrl) {
                            $urlsResult[] = $entry['request']['url'];
                        } else {
                            $urlsResult[] = $url['host'];
                        }
                    }
                }

                $urlsResult = array_unique($urlsResult);
            }
        }
    }

    if (!empty($urlsResult)) {
        echo '<div class="total-label">Total URLs: <span>' . count($urlsResult) . '</span></div>';
        echo '<div class="result">';
        foreach ($urlsResult as $item) {
            echo '<div>';
            echo $item;
            echo '</div>';
        }
        echo '</div>';
    }
}