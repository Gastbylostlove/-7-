document.addEventListener("DOMContentLoaded", function() {
    const selectBusiness = document.getElementById("business");

    selectBusiness.addEventListener("change", function() {
        const selectedBusiness = selectBusiness.value;
        console.log("선택된 사업장:", selectedBusiness);
        // 여기에 선택된 사업장에 따른 동작을 추가하세요.
    });
});
