
    const change_shop = document.querySelector('.change_shop');
    const change_person = document.querySelector('.change_person');

    // 사업장 변경 선택에 따라 근무자 변경 선택 리스트 변경
    change_shop.addEventListener('change', function () {
        const selectedOption = change_shop.options[change_shop.selectedIndex].value;
        
        if (selectedOption === 'shop') {
            // 기본 선택 사항
            change_person.innerHTML = `
                <option value="change">근무자변경</option>
            `;
        }
        else if (selectedOption === 'shop1') {
            change_person.innerHTML = `
                <option value="change">근무자변경</option>
                <option value="change1">이현준</option>
                <option value="change2">곽두팔</option>
                <option value="change5">유영곤</option>
            `;
        } else if (selectedOption === 'shop2') {
            change_person.innerHTML = `
                <option value="change">근무자변경</option>
                <option value="change3">이진규</option>
                <option value="change4">고태윤</option>
            `;
        } 
    });
