function addTh(type) {
    let table = 'Th';
    let name = (type == 'big') ? $(".big").val() : $(".mid").val();
    let parent = (type == 'big') ? 0 : $(".bigList option:selected").val();
    $.post("./api/reg.php", { name, table, parent }, (res) => {
        console.log(res);
        lof('?do=th');
        getBig();
    })
}

function getTh(type) {
    let table = 'Th';
    let parent = '';
    if (product !== 'undefind') {
        parent = (type == 'big') ? 0 : (product.big);
    } else {
        parent = (type == 'big') ? 0 : $(".bigList option:selected").val();
    }
    let list = (type == 'big') ? $(".bigList") : $(".midList");
    $.post('./api/get_th.php', { table, parent }, (res) => {
        let data = JSON.parse(res)
        // console.log(data);
        let lists = "";
        let selected = "";
        data.forEach(e => {
            console.log(e);
            if (product !== 'undefind') {
                selected = "";
                if (type == 'big' && e.id == product.big) {
                    console.log(e.id);
                    console.log(product.big);
                    selected = "selected";
                } else if (type == 'mid' && e.id == product.mid) {
                    selected = "selected";
                }
            }
            lists += `<option value='${e.id}' ${selected}>${e.name}</option>`;
        });
        console.log(lists);
        list.html(lists);
    })
}

function editTh(dom) {
    let table = $(dom).data('table');
    let id = $(dom).data('id');
    let original = $(dom).parent().prev().text();
    let name = prompt('請輸入您要修改的分類名稱', original);
    console.log(name);
    if (name != null) {
        $.post('./api/reg.php', { table, name, id }, (res) => {
            // console.log(res);
            lof('?do=th');
        })
    }
}

function sh(dom, show) {
    let all = {
        table: $(dom).data('table'),
        id: $(dom).data('id'),
        sh: show
    }
    $.post('./api/reg.php', all, (res) => {
        lof('?do=th');
    })
}

function delSess(id, dom) {
    console.log(id);
    $.post('./api/del.php', { id }, (res) => {
    // console.log(res);
    console.log(dom);
    $(dom).parents('tr').remove();
    })
}
