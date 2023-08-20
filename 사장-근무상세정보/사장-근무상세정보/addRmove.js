function add_tr(table_id) {
    let table_body = document.getElementById(table_id);
    let first_tr = table_body.firstElementChild;
    let tr_clone = first_tr.cloneNode(true);

    table_body.append(tr_clone);
    clean_first_tr(table_body.firstElementChild);
  }

  function clean_first_tr(firstTr) {
    let children = firstTr.children;

    children = Array.isArray(children) ? children : Object.values(children);
    children.forEach(x => {
      if (x !== firstTr.lastElementChild) {
        x.firstElementChild.value = '';
      }
    });
  }

  function remove_tr(This) {
    if (This.closest('tbody').childElementCount == 1) {
      alert("삭제할 수 없습니다.");
    } else {
      This.closest('tr').remove();
    }
  }