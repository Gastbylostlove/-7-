//근무 요일 추가하는 버튼
let pTagCount = 1;
let hTagCount = 1;
function create_pTag(){
  let tagArea = document.getElementById('tagArea');
  let new_pTag = document.createElement('p');
  
  new_pTag.setAttribute('class', 'pTag');
  new_pTag.innerHTML = pTagCount+". 추가된 p태그";
  
  tagArea.appendChild(new_pTag);
  
  pTagCount++;
}
function create_hTag(){
  let tagArea = document.getElementById('tagArea');
  let new_hTag = document.createElement('h'+hTagCount);
  
  new_hTag.innerHTML = "추가된 h"+hTagCount+"태그";
  
  tagArea.appendChild(new_hTag);
  
  if(hTagCount < 6)
    hTagCount++;
}