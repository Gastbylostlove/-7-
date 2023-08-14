function addRow() {
    // table element 찾기
    const table = document.getElementById('memo');
    
    // 새 행(Row) 추가
    const newRow = table.insertRow();
    
    // 새 행(Row)에 Cell 추가
    const newCell1 = newRow.insertCell(0);
    const newCell2 = newRow.insertCell(1);
    
    // Cell에 텍스트 추가
    newCell1.innerText = '날짜';
    newCell2.innerText = '내용';
  }

  function deleteRow(rownum) {
    // table element 찾기
    const table = document.getElementById('memo');
    
    // 행(Row) 삭제
    const newRow = table.deleteRow(rownum);
  }