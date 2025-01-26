<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نمرات دانش‌آموزان</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <h1>ثبت نمرات دانش‌آموزان</h1>
    </header>

    <main>
        <h2>ورود نمرات</h2>

        <?php
        if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
            echo '<div class="error-messages">';
            foreach ($_SESSION['errors'] as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
            echo '</div>';
            unset($_SESSION['errors']);
        }
        ?>

        <form action="results.php" method="POST" onsubmit="return validateForm()">
            <?php
            if (isset($_POST['studentCount'])) {
                $studentCount = $_POST['studentCount'];

                for ($i = 1; $i <= $studentCount; $i++) {
                    echo '
                    <div class="student-entry">
                        <label for="studentFirstName'.$i.'">نام:</label>
                        <input type="text" id="studentFirstName'.$i.'" name="studentFirstName'.$i.'" value="'.(isset($_POST['studentFirstName'.$i]) ? $_POST['studentFirstName'.$i] : '').'">

                        <label for="studentLastName'.$i.'">نام خانوادگی:</label>
                        <input type="text" id="studentLastName'.$i.'" name="studentLastName'.$i.'" value="'.(isset($_POST['studentLastName'.$i]) ? $_POST['studentLastName'.$i] : '').'">

                        <label for="grade'.$i.'">نمره:</label>
                        <input type="number" step="0.25" id="grade'.$i.'" name="grade'.$i.'" min="1" max="20" value="'.(isset($_POST['grade'.$i]) ? $_POST['grade'.$i] : '').'">
                    </div>';
                }
            }
            ?>

            <input type="hidden" name="class" value="<?php echo $_POST['class']; ?>">
            <input type="hidden" name="subject" value="<?php echo $_POST['subject']; ?>">

            <button type="submit" name="submit">ثبت اطلاعات</button>
            <button type="button" onclick="window.history.back()">بازگشت به صفحه قبل</button>
        </form>
    </main>

    <footer>
        <p>تمامی حقوق محفوظ است.</p>
    </footer>
    <script src="JS/script_grades.js"></script>
</body>
</html>
