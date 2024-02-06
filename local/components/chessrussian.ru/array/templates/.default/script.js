$(function () {

    $(document).on('submit', '#iForm', function (e) {
        e.preventDefault();
        const form = $(this).closest('form');
        const data = new FormData(form.get(0));
        getAjax('getResult', data);
        return false;
    });

    $(document).on('click', '#getJs', function (e) {
        let ar = $('#rez').data('ar');
        let i = $.parseJSON($('input[name=i]').val());
        $('#rez').html(closest(i, ar));
        return false;
    });

    function closest(i, ar) {
        var curr = ar[0];
        var diff = Math.abs(i - curr);
        for (var val = 0; val < ar.length; val++) {
            var new_diff = Math.abs(i - ar[val]);
            if (new_diff < diff) {
                diff = new_diff;
                curr = ar[val];
            }
        }
        return curr;
    }

    function getAjax(method, data = {}) {
        BX.ajax.runComponentAction('chessrussian.ru:array', method, {
            mode: 'class',
            data: data,
        }).then((response) => {
            $('#rez').html(response.data)
        }).catch(response => {
            alert(response.errors[0].message);
        })
    }

});