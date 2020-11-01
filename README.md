## Laravel CRUD project

##### 需求 PHP >= 7.3
#### Table
表格欄位 <br>
帳號 varchar <br>
姓名 varchar <br>
性別 varchar <br>
生日 date <br>
信箱 varchar <br>
備註 text <br>


### 內容
1. 清單頁 
2. 新增/編輯/刪除(二次確認)
3. 使用jquery 、 ajax
4. 使用彈窗(Dialog)方式開啟 新增/編輯表單頁
5. 搜尋、排序功能
6. 分頁
7. 資料驗証 (任擇二項)
   - 必填：帳號、姓名、性別、生日、信箱
   - 帳號格式：英文+數字
   - 日期格式：生日
   - 信箱格式：信箱
8. PHP Framework (laravel 8.X)
9. RWD framework (Bootstrap)
10. AJAX使用 RESTful style傳送資料
11. 資料處理
   - 帳號：字母全部轉小寫
   - 性別：顯示時為 男/女 ，資料庫儲存為 1/0
   - 生日：顯示時格式 2019年2月15日 ，資料庫儲存格式為 2019-02-15
12. 匯出資料(excel)
