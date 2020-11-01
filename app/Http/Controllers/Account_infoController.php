<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account_info;
use App\Exports\Account_infoExport;
use Maatwebsite\Excel\Facades\Excel;


class Account_infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sort = 'id';

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $account_info = Account_info::where('name', 'like', '%'.$search.'%')->orderBy($sort,
                'asc')->paginate(5);
            $account_info->appends(['search' => $search])->links();
        } else {
            $account_info = Account_info::orderBy($sort, 'asc')->paginate(5);
        }
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        };

//        return $col_name;
        $account_info->appends(['sort' => $sort])->links();
        return view('account_info')->with('account', $account_info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = $request->input('add_account');
        $account = strtolower($account);
        $birthday = $request->input('add_birthday');
        $birthday = str_replace("/", "-", $birthday);
        $gender = $request->input('add_gender');
        $email = $request->input('add_email');
        $name = $request->input('add_name');
        $remark = $request->input('add_remark');

        // creat a new Account_info
        $Account_info = new Account_info();

        // assign the account data from our request
        $Account_info->account = $account;
        $Account_info->name = $name;
        $Account_info->gender = $gender;
        $Account_info->birthday = $birthday;
        $Account_info->email = $email;
        $Account_info->remark = $remark;
//        ['id','account','name','gender','birthday','email','remark'];
        // save the Account_info
        $Account_info->save();

        $rs = [];
        $rs['status'] = 'C00';
        $rs['result'] = '新增成功';
        $rs = json_encode($rs, JSON_UNESCAPED_UNICODE);
        return $rs;
//        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account = $request->input('add_account');
        $account = strtolower($account);
        $birthday = $request->input('add_birthday');
        $birthday = str_replace("/", "-", $birthday);
        $gender = $request->input('add_gender');
        $email = $request->input('add_email');
        $name = $request->input('add_name');
        $remark = $request->input('add_remark');
        // creat a new Account_info
        $Account_info = Account_info::find($id);

        // assign the account data from our request
        $Account_info->account = $account;
        $Account_info->name = $name;
        $Account_info->gender = $gender;
        $Account_info->birthday = $birthday;
        $Account_info->email = $email;
        $Account_info->remark = $remark;
//        ['id','account','name','gender','birthday','email','remark'];
        // save the Account_info
        $Account_info->save();

        $rs = [];
        $rs['status'] = 'C00';
        $rs['result'] = '修改成功';
        $rs = json_encode($rs, JSON_UNESCAPED_UNICODE);
        return $rs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //Finding the specific task by the ID
        $account_info = Account_info::find($id);

        //Deleting the task
        $account_info->delete();

        //Flashing a session message
        $rs['status'] = 'C00';
        $rs['result'] = '刪除成功';
        $rs = json_encode($rs, JSON_UNESCAPED_UNICODE);

        //Returning a redirect back to the index
        return $rs;
    }

    public function export()
    {
//        return 123;
        return Excel::download(new Account_infoExport, 'account.xlsx');
    }
}
