// function addRow() {
//     // table element 찾기
//     const table = document.getElementById('memo');
    
//     // 새 행(Row) 추가
//     const newRow = table.insertRow();
    
//     // 새 행(Row)에 Cell 추가
//     const newCell1 = newRow.insertCell(0);
//     const newCell2 = newRow.insertCell(1);
    
//     // Cell에 텍스트 추가
//     newCell1.innerText = '날짜';
//     newCell2.innerText = '내용';
//   }

//   function deleteRow(rownum) {
//     // table element 찾기
//     const table = document.getElementById('memo');
    
//     // 행(Row) 삭제
//     const newRow = table.deleteRow(rownum);
//   }

function addRow() {
  const table = document.getElementById('memo');
  const newRow = table.insertRow();
  
  const newCell1 = newRow.insertCell(0);
  const newCell2 = newRow.insertCell(1);
  const newCell3 = newRow.insertCell(2);
  
  const dateInput = document.getElementById('dateInput');
  const contentInput = document.getElementById('contentInput');
  
  newCell1.innerText = dateInput.value;
  newCell2.innerText = contentInput.value;
  newCell3.innerHTML = '<button onclick="deleteRow(this)">삭제</button>';
  
  // 입력 폼 초기화
  dateInput.value = '';
  contentInput.value = '';
}

function deleteRow(button) {
  const row = button.parentNode.parentNode;
  const table = document.getElementById('memo');
  table.deleteRow(row.rowIndex);
}