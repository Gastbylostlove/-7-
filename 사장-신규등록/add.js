// add.js

// 저장된 선택한 값들을 보관할 배열 선언
const selectedValues = [];

// 이벤트 핸들러 추가: 클릭 버튼이 눌렸을 때의 처리
document.querySelector('.click').addEventListener('click', function() {
    // 선택한 값들 가져오기
    const selectedDay = document.querySelector('.daybox').value;
    const startHour = document.querySelector('.start_hour').value;
    const startMin = document.querySelector('.start_min').value;
    const endHour = document.querySelector('.end_hour').value;
    const endMin = document.querySelector('.end_min').value;

    // 시간과 분을 2자리 형식으로 변환
    const formattedStartHour = String(startHour).padStart(2, '0');
    const formattedStartMin = String(startMin).padStart(2, '0');
    const formattedEndHour = String(endHour).padStart(2, '0');
    const formattedEndMin = String(endMin).padStart(2, '0');

    // 선택한 값을 배열에 추가
    selectedValues.push(`${selectedDay} ${formattedStartHour}:${formattedStartMin} ~ ${formattedEndHour}:${formattedEndMin}`);

    // 선택한 값들을 출력할 div 요소 가져오기
    const selectedValuesDiv = document.querySelector('.selected_values');

    // 배열에 저장된 값들을 순회하며 출력
    let selectedText = "";
    for (const value of selectedValues) {
        // 'hour'와 'min'을 삭제하고 시간과 분을 2자리 형식으로 변환한 후 출력
        const formattedValue = value
            .replace(/hour/g, '')
            .replace(/min/g, '')
            .replace(/\d+/g, match => match.padStart(2, '0'));
        selectedText += `${formattedValue}<br>`;
    }
    selectedValuesDiv.innerHTML = selectedText;
});
