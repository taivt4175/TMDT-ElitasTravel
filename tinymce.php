<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/912q1a2e24eshu7s8psp8vgdb2fgf1z2mpuggodsnx6qp1h7/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <title>Test Tinymce</title>
</head>

<body>
    <script>
        tinymce.init({
            selector: '.textarea-demo',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
    <form action="" method="post">
        <textarea class="textarea-demo" name="textarea-demo"></textarea>
        <input type="submit" value="Submit" name="btn-submit">
    </form>
    <?php
        if (isset($_POST['btn-submit'])) {
            // $content = $_POST['textarea-demo'];
            // // echo $content;
            require ('connector/connect.php');
            // $sql = "INSERT INTO test(dv) VALUES ('$content')";
            // $result = mysqli_query($conn, $sql);
            $sql2 = "SELECT * FROM test";
            $result2 = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_assoc($result2);
            echo $row['dv'];
            // echo $_POST['textarea-demo'];
        }
    ?>
</body>

</html>