## Laravel CRUD project

[DEMO網站](https://crudproject.168.us/)
#### 網站架構 LNMP
-   linux (CentOS)
-   Nginx
-   Mysql
-   PHP(7.3)

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
1. 資料庫table
2. 清單頁
3. 新增/編輯/刪除(二次確認)
4. 使用jquery
5. 使用ajax
6. 使用彈窗(Dialog)方式開啟 新增/編輯表單頁
7. 搜尋、排序功能
8. 每頁顯示數量、分頁(Pagination)
9. 資料驗証 (任擇二項)
   - 必填：帳號、姓名、性別、生日、信箱
   - 帳號格式：英文+數字
   - 日期格式：生日
   - 信箱格式：信箱
10. PHP Framework (laravel 8.X)
11. RWD framework (Bootstrap)
12. AJAX使用 RESTful style傳送資料
13. 資料處理
    - 帳號：字母全部轉小寫
    - 性別：顯示時為 男/女 ，資料庫儲存為 1/0
    - 生日：顯示時格式 2019年2月15日 ，資料庫儲存格式為 2019-02-15
14. 匯出資料(excel)

###環境部屬以 windows xampp為例
   - 安裝 xampp(內含php7.3) [請下載php7.3版本以上](https://www.apachefriends.org/zh_tw/download.html)
   - 安裝 [composer](https://getcomposer.org/download/) <<此步驟安裝時，系統會詢問是否要將php加入path中，記得勾選。
   - git clone複製檔案至web server 的網站目錄中(ex:xampp 是在 C:\xampp\htdocs\ ,or centos nginx /usr/share/nginx/html/)
     
    git clone https://github.com/jh0712/crud_project.git
    
   - 執行 composer install(因為github上沒有vender的檔案，需要使用composer額外下載)
   
    composer install
    
   - 將.env 檔案複製到 curl_project資料夾下
   - 更新APP_KEY
    
    php artisan key:generate
    
   - 設定 [.env](https://drive.google.com/file/d/1YguwpMI1GPvJYsJwp12wiFSpYWsNMUqD/view?usp=sharing) 中的database相關設定(注意:在這database、username、password須加單引號，laravel 解析設改版)
   
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE='crud_project'
    DB_USERNAME='root'
    DB_PASSWORD=''
    
   - 開啟mysql 匯入 [sql 檔案](https://drive.google.com/file/d/1zKaYzMsCDs__LhyAud7ruOKQg8EtfD_E/view?usp=sharing)
   - 設定xampp apache httpd.conf檔案(C:\xampp\apache\conf\httpd.conf)
   - 將 DocumentRoot "C:/xampp/htdocs" ，改成"C:/xampp/htdocs/crud_project/public" ，存檔
   - 設定就緒開啟web server 即可在瀏覽器輸入 http://127.0.0.1/
   - 線上 [Demo 網站](https://crudproject.168.us/)  環境 LNMP
   
   
   
    
   
   
   
   
