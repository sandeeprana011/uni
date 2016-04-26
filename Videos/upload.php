<!DOCTYPE html>
<html>
<head>
    <script>
        /* Script written by Adam Khoury @ DevelopPHP.com */
        /* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
        function _(el) {
            return document.getElementById(el);
        }
        function uploadFile() {
            var file = _("file1").files[0];
            // alert(file.name+" | "+file.size+" | "+file.type);
            var formdata = new FormData();
            formdata.append("file1", file);

            formdata.append("description",document.getElementById("description").value);
            formdata.append("pornstar_id",document.getElementById("pornstar_id").value);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "progress.php");
            ajax.send(formdata);
        }
        function progressHandler(event) {
            _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        }
        function completeHandler(event) {
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0;
        }
        function errorHandler(event) {
            _("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event) {
            _("status").innerHTML = "Upload Aborted";
        }
    </script>
</head>
<body>
<h2>HTML5 File Upload Progress Bar</h2>

<form id="upload_form" enctype="multipart/form-data" method="post">
    <input type="file" name="file1" id="file1"><br>
    <select id="pornstar_id" name="pornstar_id">
        <?php
        include '../db.php';
        $result = $conn->query('select * from ux_pornstar');
//        var_dump($result);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"" . $row["pornstar_id"] . "\">" . $row["name"] . "</option>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

    </select>
    <br>
    Description Here :<br>
    <input type="text" name="description" id="description">
    <br>
    <input type="button" value="Upload File" onclick="uploadFile()">
    <br>
    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
    <h3 id="status"></h3>

    <p id="loaded_n_total"></p>
</form>
</body>
</html>


<!--	echo "Starting ffmpeg...\n\n";-->
<!--	echo shell_exec("ffmpeg -ss 10 -i bbb.mp4 -vframes 1 -s 420x270 Out.jpg ");-->
<!--	echo "Done.\n";-->
