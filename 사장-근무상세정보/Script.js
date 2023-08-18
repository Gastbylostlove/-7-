function editSelectedItems() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxes.forEach(function(checkbox) {
        var label = checkbox.parentElement;
        var text = label.childNodes[2].textContent;
        var newText = prompt("수정할 내용을 입력하세요:", text);
        if (newText !== null && newText.trim() !== "") {
            label.childNodes[2].textContent = newText;
        }
    });
}
