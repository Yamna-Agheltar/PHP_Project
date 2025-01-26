<?php
session_start(); 
$students = []; 
$average = 0; 
$class = ''; 
$subject = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $students = [];
    $studentCount = 0;
    
    while (isset($_POST['studentFirstName' . ($studentCount + 1)]) && isset($_POST['studentLastName' . ($studentCount + 1)])) {
        $studentCount++;
    }

    for ($i = 1; $i <= $studentCount; $i++) {
        $studentFirstName = isset($_POST['studentFirstName'.$i]) ? $_POST['studentFirstName'.$i] : ''; 
        $studentLastName = isset($_POST['studentLastName'.$i]) ? $_POST['studentLastName'.$i] : ''; 
        $grade = isset($_POST['grade'.$i]) ? $_POST['grade'.$i] : 0; 

        if (!empty($studentFirstName) && !empty($studentLastName) && $grade != 0) {
            $studentFullName = $studentFirstName . ' ' . $studentLastName;
            $status = ($grade >= 12) ? "قبول" : "مردود";
            $students[] = [
                'firstName' => $studentFirstName,
                'lastName' => $studentLastName,
                'grade' => $grade,
                'status' => $status
            ];
        }
    }

    $totalGrade = array_sum(array_column($students, 'grade'));
    $studentCount = count($students);
    
    if ($studentCount > 0) {
        $average = round($totalGrade / $studentCount, 2);
    }
    $class = $_POST['class'];
    $subject = $_POST['subject'];
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتایج نهایی</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <h1>نتایج نهایی ثبت نمرات</h1>
    </header>

    <main>
        <h2>جزئیات نتایج</h2>
        <table>
            <thead>
                <tr>
                    <th>نام دانش‌آموز</th>
                    <th>نمره</th>
                    <th>وضعیت قبولی</th>
                    <th>کلاس</th>
                    <th>درس</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($students as $student) {
                    echo "
                    <tr>
                        <td>{$student['firstName']} {$student['lastName']}</td>
                        <td>{$student['grade']}</td>
                        <td>{$student['status']}</td>
                        <td>{$class}</td>
                        <td>{$subject}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

        <h3>معدل کل کلاس: <?php echo $average; ?></h3>

        <div class="actions">
    <form action="index.php" method="POST" style="display: inline-block;">
        <button type="submit">ایجاد گزارش جدید</button>
    </form>

    <form action="register_grades.php" method="POST" style="display: inline-block;" >
        <input type="hidden" name="class" value="<?php echo $class; ?>">
        <input type="hidden" name="subject" value="<?php echo $subject; ?>">
        <input type="hidden" name="studentCount" value="<?php echo count($students); ?>">
        <?php 
        foreach ($students as $index => $student) {
            echo "<input type='hidden' name='studentFirstName".($index+1)."' value='{$student['firstName']}'>";
            echo "<input type='hidden' name='studentLastName".($index+1)."' value='{$student['lastName']}'>";
            echo "<input type='hidden' name='grade".($index+1)."' value='{$student['grade']}'>";
        }
        ?>
        <button type="submit">ویرایش اطلاعات</button>
    </form>

    <button onclick="window.print()" style="display: block;">چاپ گزارش</button>
</div>
    </main>

    <footer>
        <p>تمامی حقوق محفوظ است.</p>
    </footer>
</body>
</html>
