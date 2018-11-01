<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
  // public function getIndex()
  // {
  // $query = \App\Student::query();
  // // 全件取得 +ページネーション
  // $students = $query->orderBy('id','desc')->paginate(10);
  // return view('users.list')->with('students',$students);
  // }
  public function getIndex(Request $rq)
{
//キーワード受け取り
$keyword = $rq->input('keyword');
 
//クエリ生成
$query = \App\Student::query();
 
//もしキーワードがあったら
if(!empty($keyword))
{
$query->where('email','like','%'.$keyword.'%')->orWhere('name','like','%'.$keyword.'%');
}
 
//ページネーション
$students = $query->orderBy('id','desc')->paginate(10);
return view('users.list')->with('students',$students)->with('keyword',$keyword);
}
// 入力
  public function new_index()
  {
  return view('student.new_index');
  }
  // 確認
  public function new_confirm(\App\Http\Requests\CheckStudentRequest $req)
{
$data = $req->all();
return view('student.new_confirm')->with($data);
}
// 完了
public function new_finish(Request $request)
{
// Studentオブジェクト生成
$student = new \App\Student;
 
// 値の登録
$student->name = $request->name;
$student->email = $request->email;
$student->tel = $request->tel;
 
// 保存
$student->save();
 
// 一覧にリダイレクト
// return redirect()->to('student/list');
// 新規登録メッセージ表示
return redirect()->to('student/list')->with('flashmessage', '登録が完了いたしました。');
}

// ユーザー情報の編集 //
public function edit_index($id)
{
$student = \App\Student::findOrFail($id);
return view('student.edit_index')->with('student',$student);
}
// 編集確認
public function edit_confirm(\App\Http\Requests\CheckStudentRequest $req)
{
$data = $req->all();
return view('student.edit_confirm')->with($data);
}
// 編集完了（DB更新）
public function edit_finish(Request $request, $id)
{
//レコードを検索
$student = \App\Student::findOrFail($id);
//値を代入
$student->name = $request->name;
$student->email = $request->email;
$student->tel = $request->tel;
 
//保存（更新）
$student->save();
 
//リダイレクト
// return redirect()->to('student/list');
// 更新メッセージ表示
return redirect()->to('student/list')->with('flashmessage', '更新が完了いたしました。');
}

// ユーザーの削除//
public function us_delete($id){
//削除対象レコードを検索
$user = \App\Student::find($id);
//削除
$user->delete();
//リダイレクト
// return redirect()->to('student/list');
// 削除メッセージ表示
return redirect()->to('student/list')->with('flashmessage', '削除が完了いたしました。');
}

public function create(Request $request){
  //登録処理

  return redirect('layouts.layout')->with('message', '登録が完了しました。');
}

}
