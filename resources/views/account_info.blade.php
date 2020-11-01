<!doctype html>
<html lang="tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Info</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>
<body>
<div class="container mt-10">
    <div class="dropdown" style="margin: 1%;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            排序
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/account/?sort=id">依據編號</a>
            <a class="dropdown-item" href="/account/?sort=name">依據名稱</a>
            <a class="dropdown-item" href="/account/?sort=birthday">依據生日</a>
        </div>
        <input class="form-control" type="text" placeholder="人名搜索" id="search_name_val" aria-label="Search"
               style="width: 30%;display: inline-block;margin-left: 2%;">
        <button class="btn btn-success" type="button" onclick="search_name();">
            查詢
        </button>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">帳號</th>
            <th scope="col">姓名</th>
            <th scope="col">性別</th>
            <th scope="col">生日</th>
            <th scope="col">信箱</th>
            <th scope="col">備註</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($account as $account_info)
            <tr>
                <th scope="row">{{ $account_info -> id }}</th>
                <td>{{ $account_info -> account }}  </td>
                <td>{{ $account_info -> name }}  </td>
                <td>
                    @if (($account_info -> gender) == 1)
                        男
                    @else
                        女
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($account_info->birthday)->format('Y年m月d日')}}</td>
                <td>{{ $account_info -> email }}</td>
                <td>{{ $account_info -> remark }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#edit_{{$account_info->id}}">
                        編輯
                    </button>
                    <button type="button" class="btn btn-danger" onclick="remove_account({{$account_info -> id}});">
                        刪除
                    </button>
                </td>
            </tr>
            <div class="modal fade" id="edit_{{$account_info->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding: 5%">
                        <form id="edit_form_{{$account_info -> id}}">
                            <div class="form-group">
                                <label for="add_account">帳號</label>
                                <input type="text" class="form-control" id="add_account_{{$account_info -> id}}"
                                       placeholder="輸入帳號" value="{{$account_info ->account}}">
                            </div>
                            <div class="form-group">
                                <label for="add_name">姓名</label>
                                <input type="text" class="form-control" id="add_name_{{$account_info -> id}}"
                                       placeholder="輸入姓名" value="{{$account_info->name}}">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " name="gender_{{$account_info -> id}}" type="radio"
                                       id="add_gender_man_{{$account_info -> id}}" value="1"
                                       @if (($account_info ->gender) ==1) checked @endif
                                >
                                <label class="form-check-label" for="add_gender_man">男</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender_{{$account_info -> id}}" type="radio"
                                       id="add_gender_woman_{{$account_info -> id}}" value="0"
                                       @if (($account_info ->gender) ==0) checked @endif>
                                <label class="form-check-label" for="add_gender_woman">女</label>
                            </div>
                            <div class="form-group">
                                <label for="add_birthday">生日</label>
                                <input type="date" class="form-control" id="add_birthday_{{$account_info -> id}}"
                                       placeholder="輸入生日ex:1997-07-12" value="{{$account_info->birthday}}">
                            </div>
                            <div class="form-group">
                                <label for="add_email">信箱</label>
                                <input type="email" class="form-control" id="add_email_{{$account_info -> id}}"
                                       aria-describedby="emailHelp" placeholder="Enter email"
                                       value="{{$account_info->email}}">
                                <small class="form-text text-muted">請輸入正確格式ex:kite@gmail.com</small>
                            </div>
                            <div class="form-group">
                                <label for="add_remark">備註</label>
                                <input type="text" class="form-control" id="add_remark_{{$account_info -> id}}"
                                       aria-describedby="emailHelp" placeholder="備註欄輸入"
                                       value="{{$account_info->remark}}">
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"
                                    onclick="edit_account({{$account_info -> id}});">送出
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
</div>
<div class="container mt-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_account_insert">
        新增
    </button>
    <a href="/usr/export" target="_blank">
        <button type="button" class="btn btn-primary">
            匯出全部資料
        </button>
    </a>
    <!-- Modal -->
    <div class="modal fade" id="add_account_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 5%">
                <form>
                    <div class="form-group">
                        <label for="add_account">帳號</label>
                        <input type="text" class="form-control" id="add_account" placeholder="輸入帳號">
                    </div>
                    <div class="form-group">
                        <label for="add_name">姓名</label>
                        <input type="text" class="form-control" id="add_name" placeholder="輸入姓名">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " name="gender" type="radio" id="add_gender_man" value="1">
                        <label class="form-check-label" for="add_gender_man">男</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="gender" type="radio" id="add_gender_woman" value="0">
                        <label class="form-check-label" for="add_gender_woman">女</label>
                    </div>
                    <div class="form-group">
                        <label for="add_birthday">生日</label>
                        <input type="date" class="form-control" id="add_birthday" placeholder="輸入生日ex:1997-07-12">
                    </div>
                    <div class="form-group">
                        <label for="add_email">信箱</label>
                        <input type="email" class="form-control" id="add_email" aria-describedby="emailHelp"
                               placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">請輸入正確格式ex:kite@gmail.com</small>
                    </div>
                    <div class="form-group">
                        <label for="add_remark">備註</label>
                        <input type="text" class="form-control" id="add_remark" aria-describedby="emailHelp"
                               placeholder="備註欄輸入">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="send_add_account();">送出</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6 text-center">
            {{$account ->links()}}
        </div>
    </div>
</div>
<script>
    function send_add_account() {
        error_msg_check = true;
        errorcheckmsg = '';
        add_account = $('#add_account').val();
        add_account_rule = /^([a-zA-Z]+\d+|\d+[a-zA-Z]+)[a-zA-Z0-9]*$/;
        if (add_account_rule.test(add_account) == false) {
            errorcheckmsg += "帳號必須為英數混和！\n";
            error_msg_check = false;
        }

        add_name = $('#add_name').val();
        if (add_name == '') {
            errorcheckmsg += "請輸入姓名！\n";
            error_msg_check = false;
        }
        gender_status = $('input[name=gender]:checked').val();
        if (gender_status != 0 && gender_status != 1) {
            errorcheckmsg += "請選擇性別！\n";
            error_msg_check = false;
        } else {
            add_gender = gender_status;
        }

        add_birthday = $('#add_birthday').val();
        if (add_birthday == '') {
            errorcheckmsg += "請選擇生日！\n";
            error_msg_check = false;
        }
        add_email = $('#add_email').val();
        var emailRule = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
        if (emailRule.test(add_email) == false) {
            errorcheckmsg += "請輸入正確E-mail！\n";
            error_msg_check = false;
        }
        add_remark = $('#add_remark').val();

        if (error_msg_check == false) {
            alert(errorcheckmsg);
            return false;
        }
        $.ajax({
            url: 'https://crudproject.168.us/api/account',// 跳轉到 action
            data: {
                add_account: add_account,
                add_name: add_name,
                add_gender: add_gender,
                add_birthday: add_birthday,
                add_email: add_email,
                add_remark: add_remark
            },
            type: 'post',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                console.log(textStatus);
                console.log(jqXHR.status);
                if (data.status == 'C00') {
                    alert('新增成功');
                    window.location.href = "/";
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('操作異常');
                // alert(jqXHR.responseText);
                window.location.href = "/";
            }
        });
    }

    function remove_account(account_id) {
        if (confirm("確定刪除嗎?")) {
            $.ajax({
                url: 'https://crudproject.168.us/api/account/' + account_id,
                type: 'delete',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    console.log(textStatus);
                    console.log(jqXHR.status);
                    if (data.status == 'C00') {
                        alert('刪除成功');
                        window.location.href = "/";
                    } else {
                        alert('操作異常');
                        window.location.href = "/";
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // view("異常！");
                    // alert(jqXHR.responseText);
                    console.log('err');
                    alert('操作異常');
                    window.location.href = "/";
                }
            });
        } else {
        }
    }

    function edit_account(account_id) {
        error_msg_check = true;
        errorcheckmsg = '';
        add_account = $('#add_account_' + account_id).val();
        add_account_rule = /^([a-zA-Z]+\d+|\d+[a-zA-Z]+)[a-zA-Z0-9]*$/;
        if (add_account_rule.test(add_account) == false) {
            errorcheckmsg += "帳號必須為英數混和！\n";
            error_msg_check = false;
        }
        add_name = $('#add_name_' + account_id).val();
        if (add_name == '') {
            errorcheckmsg += "請輸入姓名！\n";
            error_msg_check = false;
        }
        gender_status = $('input[name=gender_' + account_id + ']:checked').val();
        if (gender_status != 0 && gender_status != 1) {
            errorcheckmsg += "請選擇性別！\n";
            error_msg_check = false;
        } else {
            add_gender = gender_status;
        }

        add_birthday = $('#add_birthday_' + account_id).val();
        if (add_birthday == '') {
            errorcheckmsg += "請選擇生日！\n";
            error_msg_check = false;
        }
        add_email = $('#add_email_' + account_id).val();
        var emailRule = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
        if (emailRule.test(add_email) == false) {
            errorcheckmsg += "請輸入正確E-mail！\n";
            error_msg_check = false;
        }
        add_remark = $('#add_remark_' + account_id).val();

        if (error_msg_check == false) {
            alert(errorcheckmsg);
            return false;
        }
        $.ajax({
            url: 'https://crudproject.168.us/api/account/' + account_id,// 跳轉到 action
            data: {
                add_account: add_account,
                add_name: add_name,
                add_gender: add_gender,
                add_birthday: add_birthday,
                add_email: add_email,
                add_remark: add_remark
            },
            type: 'put',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                console.log(textStatus);
                console.log(jqXHR.status);
                if (data.status == 'C00') {
                    alert('修改成功');
                    window.location.href = "/";
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('操作異常');
                window.location.href = "/";
            }
        });
    }


    function search_name() {
        search = $('#search_name_val').val();
        window.location.href = '/account/?search=' + search;

    }
</script>
</body>
</html>
