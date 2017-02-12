<?php   
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use app\index\model\Users;
use app\index\model\Data;

class Index extends Controller
{
        public function index($name = "张三")
        {
            echo "hello world";
            print_r($this->request->param());
            $data = Db::name('users')->select();
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            $this->assign('data',$data);
            $this->assign('name',$name);
            return $this->fetch();
        }

        public function index2($name = '李四',$sex = '男')
        {
             echo "hello world";
             echo '姓名'.$name,'性别'.$sex;

        }

        public function hello($name="")
        {
            $arr = ['a','b','c'];
            var_dump($arr);
            echo '</br>';
            echo url('','a=1&b=2');
            echo '</br>';
            echo "hello:".$name;
            echo '</br>';
            if ($name==null) {
                echo "没有参数";
            }else{
                print_r($this->request->param());
            }
            
        }

        public function hello2()
        {
            $request = Request::instance();
            echo $this->request->url();//获取当前url地址，不含域名
            echo '</br>';
            echo request()->url();//获取地址
            echo '</br>';
            print_r(request()->param());//获取参数
            echo '</br>';
            print_r(request()->param('name'));//获取指定参数
            echo '</br>';
            print_r(input());//获取参数
            echo '</br>';
            echo input('name');//获取指定参数
            echo '</br>';
            echo input('sex');//获取指定参数
            echo '</br>';
            echo '==================request=================';
            echo '</br>';
            echo 'GET参数';
            print_r($request->get());
//            echo '</br>';
//            echo $_GET['name'] ;
            echo '</br>';
            echo '==================request其他参数==========='.'</br>';
            echo '请求方法：'.$request->method().'</br>';
            echo '访问IP：'.$request->ip().'</br>';
            echo '是否是Ajax请求：'.($request->isAjax()?'是':'否').'</br>';
            echo '当前域名：'.$request->domain().'</br>';
            echo '当前入口文件：'.$request->baseFile().'</br>';
            echo '包含域名的完整url地址：'.$request->url(true).'</br>';
            echo '获得url地址的参数信息：'.$request->query().'</br>';
            echo '当前url地址  不含QUERY_STRING（域名和参数）：'.$request->baseUrl().'</br>';
            echo 'url地址栏中的pathinfo信息：'.$request->pathinfo().'</br>';
            echo 'url地址中的后缀信息：'.$request->ext().'</br>';
            echo '==================request  当前模块/控制器/操作信息==========='.'</br>';
            echo '模块：'.$request->module().'</br>';
            echo '控制器：'.$request->controller().'</br>';
            echo '方法：'.$request->action().'</br>';
        
        }
        
        public function hello3()
        {
           //  $this->success('safadfdsa','admin/index/index');
           //  $this->error('safadfdsa','admin/index/hello');
           //  $this->redirect('http://www.baidu.com');
           // $data = ['name'=>'thinkphp','status'=>'1'];
           // var_dump($data);
           // return json($data);
          //  return xml($data);
        }
        
        public function database()
        {
            //插入数据
//            $result = Db::execute("insert into tp_users (email,password,sex) values ('456@qq.com','123456',1)");
//            var_dump($result);
            //更新数据
//            $result = Db::execute("update tp_users set password='555555' where user_id=6");
//            dump($result);
            //删除数据
//            $result = Db::execute("delete from tp_users where user_id=7");
//            dump($result);
            //查询数据
//            $result = Db::query("select  * from tp_users where user_id=6");
//            dump($result);
//             $result = Db::query("show tables from demo");
//             dump($result);
            //清空数据表
//            $result = Db::execute("TRUNCATE table tp_data");
//            if ($result==0) {
//                echo "清空成功";
//            }else{
//                echo "清空失败";
//            }
            //数据库转换  db2在config.php中设置
            //dump是tp中自定义的函数，功能与var_dump 相似
//            $result = Db::connect('db2')->query('select * from tp_users');
//            dump($result);
            //参数绑定
//            $result = Db::query('select * from tp_users where user_id=?',[6]);
//            dump($result);
            //查询构造器
//            $result = Db::table('tp_users')
//                      ->where('user_id',6)
//                    ->select();
//            dump($result);
//            $result = Db::name('data')
//                    ->insert(['fenshu'=>88]);
//            echo $result;
//            $result = Db::name('users')
//                    ->where('sex',1)
//                    ->field('user_id,email,password')
//                    ->order('user_id','asc')
//                    ->select();
//           return json($result);
            //事务
            Db::transaction(function () {
              $result1 =  Db::name('data')->delete(7);
              $result2 =  Db::name('data')->insert(['fenshu'=>100]);
                if ($result1>0&&$result2>0) {
                    echo "事务成功";
                } else{
                    echo "事务失败";
                }
            });
        }

        /*@
               查询语言
         */
        public function select(){
            // $result = Db::name('data')->where('id',11)->find();
            //  dump($result);
            // $result = Db::name('data')->where('id','>',11)->order('id','asc')->limit(2)->select();
            //  dump($result); 
           //多表联合查询
            // $result = Db::query("select * from tp_data as d inner join tp_users as u on d.id = u.user_id ");
            // dump($result);
            // $result = Db::query("select fenshu , email from tp_data as d join tp_users as u on d.id = u.user_id order by d.id desc");
            // dump($result);
            //模糊查询  占位符 防sql注入
            // $result = Db::name('data')->where('id = :id',['id'=>11])->order('id','asc')->select();
            // dump($result);
           // 日期查询
//           $result = Db::name('data')->insert(['fenshu'=>98]);
//           echo $result;
//            $result = Db::name('data')->whereTime('reg_time','>','2017-2-10')->select();
//            dump($result);
//             $result = Db::name('data')->whereTime('reg_time','>','this week')->select();
//            dump($result);
//             $result = Db::name('data')->whereTime('reg_time','>','-2 days')->select();
//            dump($result);
//             $result = Db::name('data')->whereTime('reg_time','>','today')->select();
//            dump($result);
            //分块查询
//           $p = 0;
//           do{
//               $result = Db::name('data')->limit($p,2)->select();
//               $p+=2;
//               //逻辑处理代码
//               dump($result);
//           } while(count($result)>0);
            
//            $arr = ['fenshu'=>88];
//            $result = Db::name('data')->insert($arr);
//            echo $result;
//            
//               $arr = ['email'=>'123@qq.com','password'=>123456789];
//            $result = Db::name('users')->insert($arr);
//            echo $result;
//           
           
        }
        
        public function testModel()
        {
//            Users模型
//            $a = Users::get(12);
//            dump($a);
//            $users = new Users;
//            $users->email = '123456@163.com';
//            $users->password = '123456';
//            echo $result =  $users->save();
//            
//            Data模型
//            $b = Data::get(28);
//            dump($b);
//            $data = new Data;
//            $data->fenshu = 0;
//            $result = $data->save();
//            echo $result;
            
//            批量新增
//           $users = new Users;
//            $list = [
//                ['email'=>'123@qq.com','password'=>000],
//                ['email'=>'234@qq.com','password'=>111]
//            ];
//            if ($users->saveAll($list)) {
//                return '用户批量新增成功';
//            } else{
//                return $users->getError();
//            }
            
//            $result = Db::name('users')
//                    ->insert(
//                            ['email'=>'123@qq.com','password'=>000],
//                            ['email'=>'234@qq.com','password'=>111]
//                            );
//                            if ($result>0) {
//                                return '新增成功';
//                            }else{
//                                return '新增失败';
//                            }
            
            //更新用户数据
//            $user = Users::get(6);//get($a) $a为主键
//            dump($user);exit;
//            $user['email']= '111@qq.com';
//            $user->password =3332;
//            $result = $user->save();
//            if ($result>0) {
//                return '更新用户成功';
//            }else{
//                return '更新用户失败';
//            }
//            根据某个条件查询数据 getByXxxx() 方法
//            $user = Users::getByPassword('34234');
//            dump($user);
//            echo $user['password'];
//           echo $user['email'];
            //删除数据
            $user = Users::destroy(18);
            if ($user>0) {
                return '删除成功';
            }else{
                return '删除失败';
            }
        }
        
}

