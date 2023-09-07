$(function () {
    // 名字
    $('input[name="first_name"]').blur(function () {
        validateFirstName();
    });

    // 名前
    $('input[name="last_name"]').blur(function () {
        validateLastName();
    });

    // メールアドレス
    $('input[name="email"]').blur(function () {
        validateEmail();
    });

    // 郵便番号
    $('input[name="postcode"]').blur(function () {
        searchAddress();
    });

    // 住所
    $('input[name="address"]').blur(function () {
        validateAddress();
    });

    // ご意見
    $('textarea[name="opinion"]').blur(function () {
        validateOpinion();
    });

});


// 名字バリデーション
function validateFirstName() {
    let firsName = $('input[name="first_name"]').val();
    // 必須チェック
    if (firsName == '') {
        $('#first-name-error').text('必須項目です');
        return;
    } else {
        $('#first-name-error').text('');
    }
}

// 名字バリデーション
function validateLastName() {
    let lastName = $('input[name="last_name"]').val();
    // 必須チェック
    if (lastName == '') {
        $('#last-name-error').text('必須項目です');
        return;
    } else {
        $('#last-name-error').text('');
    }
}

// メールアドレスバリデーション
function validateEmail() {
    let email = $('#email').val();

    // 必須チェック
    if (email == '') {
        $('#email-error').text('必須項目です');
        return;
    } else {
        $('#email-error').text('');
    }

    // 半角数字と半角ハイフン以外が含まれていた場合エラーとする
    if (!email.match(/^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/)) {
        $('#email-error').text('メール形式で入力してください');
        return;
    } else {
        $('#email-error').text('');
    }
}

// 住所検索（郵便番号バリデーション）
function searchAddress() {
    let postcode = $('#postcode').val();

    // 必須チェック
    if (postcode == '') {
        $('#postcode-error').text('必須項目です');
        return;
    } else {
        $('#postcode-error').text('');
    }

    // 全角数字を半角数字に変換
    postcode = replaceInteger(postcode);
    // 全角ハイフンを半角ハイフンに変換
    postcode = replaceHyphen(postcode);

    // 変換後の文字に書き換える
    $('#postcode').val(postcode);

    // 半角数字と半角ハイフン以外が含まれていた場合はエラー
    if (postcode.match(/[^0-9][-]/)) {
        $('#postcode-error').text('ハイフンありの半角数字を８文字で入力してください');
        return;
    } else {
        $('#postcode-error').text('');
    }

    // ８文字でない場合はエラー
    if (postcode.length != 8) {
        $('#postcode-error').text('８文字で入力してください');
        return;
    } else {
        $('#postcode-error').text('');
    }

    // ハイフンが含まれていない場合はエラー
    if (!postcode.match(/-/)) {
        $('#postcode-error').text('ハイフンを含めて入力してください');
        return;
    } else {
        $('#postcode-error').text('');
    }

    // 住所検索実行
    searchAddressAjax(postcode);
}

// 住所バリデーション
function validateAddress() {
    let address = $('input[name="address"]').val();
    // 必須チェック
    if (address == '') {
        $('#address-error').text('必須項目です');
        return;
    } else {
        $('#address-error').text('');
    }
}

// ご意見バリデーション
function validateOpinion() {
    let address = $('textarea[name="opinion"]').val();
    // 必須チェック
    if (address == '') {
        $('#opinion-error').text('必須項目です');
        return;
    } else {
        $('#opinion-error').text('');
    }
}

// 住所検索実行(Ajax)
function searchAddressAjax(postcode) {
    $.ajax({
        url: 'https://zipcloud.ibsnet.co.jp/api/search',
        type: 'GET',
        dataType: 'json',
        data: {
            'zipcode': postcode
        },
        success: function(data) {
            if (data.results) {
                var result = data.results[0];
                var address = result.address1 + result.address2 + result.address3;
                $('#address').val(address);
            } else {
                $('#postcode-error').text('該当する住所が見つかりませんでした。');
            }
        },
        error: function() {
            $('#postcode-error').text('エラーが発生しました。');
        }
    });
}

// 全角英数字を半角英数字に変換
function replaceInteger(str) {
    console.log(str);

    return str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
		return String.fromCharCode(s.charCodeAt(0) - 65248);
    });
}

// 全角ハイフンを半角ハイフンに変換
function replaceHyphen(str) {
    return str.replace(/ー/g, '-');
}
