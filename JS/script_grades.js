function validateForm() {
    var studentCount = document.querySelectorAll('.student-entry').length;
    for (var i = 1; i <= studentCount; i++) {
        var firstName = document.getElementById('studentFirstName' + i).value;
        var lastName = document.getElementById('studentLastName' + i).value;
        var grade = document.getElementById('grade' + i).value;

        if (firstName.trim() === "" || lastName.trim() === "" || grade === "") {
            alert("لطفاً تمامی فیلدها را پر کنید.");
            return false;
        }
    }
    return true;
}