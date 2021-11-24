lesson-66：宝塔部署

## 步骤：
1. 由于本地开发使用的数据库为10.4.11-MariaDB 而线上环境是 MySQL5.6,若直接导出sql文件会导致在上传到线上数据库时提示“索引大小超过767”。

### 解决办法：https://learnku.com/articles/9213/767-bytes-length-restrictions-on-indexing
推荐升级数据库为5.7

老师采用方式：在创建数据表时候，添加配置（官网推荐）：

```
use Illuminate\Support\Facades\Schema;

/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
    Schema::defaultStringLength(191);
}
```

2. 部署优化
找到env文件，将APP_DEBUG=true
```
php artisan config:cache
php artisan config:clear
php artisan view:clear

```


3. 压缩文件夹并上传到宝塔面板进行解压,修改文件夹权限为777
4. 在宝塔面板中创建数据库及用户名，密码
5. 进入创建的数据库，导入本地下载的sql文件
6. 在宝塔面板中安装php扩展
7. 设置禁用函数，如：putenv,symlink或根据实际提示进行删除
可能存在的报错提示：

eg:putenv() has been disabled for security reasons

eg:symlink() has been disabled for security reasons.
8. 在宝塔面板中找到网站，点击配置站点
9. 进入设置页面，选择网站目录，选择上传的文件夹并进入/public文件
10. 添加伪静态
```
location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
```


11. 进入上传文件夹的.env环境中，修改APP_URL,数据库信息
12. 访问域名进行测试

### Tips:
其他问题：Laravel项目图片无法显示（如：登录后的头像）
存在问题：可能由于软连接失败
解决办法：进入到public文件夹，执行下方命令，创建软链接
```
php artisan storage:link
```
### 部署参考链接：https://blog.csdn.net/tank_ft/article/details/110542911
