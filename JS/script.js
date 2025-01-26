function validateStudentCount() {
    var studentCount = document.getElementById("studentCount").value;
    if (studentCount < 1 || studentCount > 26) {
        alert("تعداد دانش‌آموزان باید بین 1 تا 26 باشد.");
        return false;
    }
    return true;
}

function updateSubjects() {
    const classValue = document.getElementById("class").value;
    const fieldValue = document.getElementById("field").value;
    const subjectSelect = document.getElementById("subject");

    subjectSelect.innerHTML = "";
    const subjects = {
        "network_software": {
            "10": ["تولید محتوا", "نصب سیستم", "دانش فنی پایه"],
            "11": ["توسعه پایگاه داده", "طراحی وب"],
            "12": ["تجارت الکترونیک", "دانش فنی تخصصی", "تجهیزات شبکه"]
        },
        "graphic": {
            "10": ["طراحی", "عکاسی", "خوشنویسی"],
            "11": ["عکاسی", "طراحی", "چاپ دستی"],
            "12": ["صفحه‌آرایی", "مبانی تصویرسازی", "خط در گرافیک"]
        },
        "photography": {
            "10": ["عکاسی پرسنلی", "تصویرسازی", "دانش فنی پایه"],
            "11": ["عکاسی آتلیه", "تصویرگری کتاب کودک"],
            "12": ["عکاسی طبیعت", "عکاسی مطبوعاتی", "دانش فنی تخصصی"]
        }
    };

    const selectedField = subjects[fieldValue][classValue];
    selectedField.forEach(subject => {
        const option = document.createElement("option");
        option.value = subject;
        option.textContent = subject;
        subjectSelect.appendChild(option);
    });
}

updateSubjects();
