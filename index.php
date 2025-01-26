<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سامانه گزارش‌گیری نمرات درسی</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <h1>سامانه گزارش‌گیری نمرات درسی</h1>
    </header>

    <main>
        <h2>ورود اطلاعات کلاس</h2>
        <form action="register_grades.php" method="POST" id="classForm" onsubmit="return validateStudentCount()">
            <div class="form-item">
                <label for="class">انتخاب کلاس:</label>
                <select id="class" name="class" onchange="updateSubjects()" >
                    <option value="10">دهم</option>
                    <option value="11">یازدهم</option>
                    <option value="12">دوازدهم</option>
                </select>
            </div>

            <div class="form-item">
                <label for="field">انتخاب رشته:</label>
                <select id="field" name="field" onchange="updateSubjects()" >
                    <option value="network_software">شبکه و نرم‌افزار</option>
                    <option value="graphic">گرافیک</option>
                    <option value="photography">فتوگرافیک</option>
                </select>
            </div>

            <div class="form-item">
                <label for="subject">انتخاب نام درس:</label>
                <select id="subject" name="subject" >
                </select>
            </div>

            <div class="form-item">
                <label for="studentCount">تعداد دانش‌آموزان:</label>
                <input type="number" id="studentCount" name="studentCount" min="1" max="26" >
            </div>

            <button type="submit">ثبت اطلاعات</button>
        </form>
    </main>

    <footer>
        <p>تمامی حقوق محفوظ است.</p>
    </footer>
    <script src="JS/script.js"></script>
</body>
</html>
