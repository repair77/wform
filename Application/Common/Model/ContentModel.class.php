<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
* 表单model
*/
class ContentModel extends BaseModel{
    // 自动验证
    protected $_validate=array(
        array('cid','require','必须选择分类'),
        array('title','require','标题必填'),
        // array('summary','require','请简要描述你的表单'),
        // array('author','require','作者必填'),
        array('process','require','处理程序必填'),

        );

    // 自动完成
    protected $_auto=array(
        array('views',0),
        array('is_delete',0),
        array('addtime','time',1,'function'),
        );

    // 获得描述；供自动完成调用
    /*
    * 截取前200个内容的字符
    */

    // 顿号转换为英文逗号
    protected function comma2coa($keywords){
        return str_replace('、', ',', $keywords);
    }

    // 添加数据
    public function addData(){
        // 获取post数据
        $data=I('post.');
        // 反转义为下文的 preg_replace使用
        // $data['content']=htmlspecialchars_decode($data['content']);
        // // 判断是否修改表单中图片的默认的alt 和title
        // $image_title_alt_word=C('IMAGE_TITLE_ALT_WORD');
        // if(!empty($image_title_alt_word)){
        //     // 修改图片默认的title和alt
        //     $data['content']=preg_replace('/title=\"(?<=").*?(?=")\"/','title=""',$data['content']);
        //     $data['content']=preg_replace('/alt=\"(?<=").*?(?=")\"/','alt=""',$data['content']);
        // }
        // 将绝对路径转换为相对路径
        // $data['content']=preg_replace('/src=\"^\/.*\/Upload\/image\/ueditor$/','src="/Upload/image/ueditor',$data['content']);
        // 转义
        // $data['content']=htmlspecialchars($data['content']);
        if($this->create($data)){
            //获取表单内容图片
            // $image_path=get_ueditor_image_path($data['content']);
            if($id=$this->add()){
                echo "<script>alert(1);</script>";
                if(isset($data['tids'])){
                    D('ArticleTag')->addData($id,$data['tids']);
                }
                if(!empty($image_path)){
                    // 添加水印
                    if(C('WATER_TYPE')!=0){
                        foreach ($image_path as $k => $v) {
                            add_water('.'.$v);
                        }
                    }
                    // 传递图片插入数据库
                    D('ArticlePic')->addData($id,$image_path);
                }
                // 获取未删除和展示的表单
                $sitemap_map=array(
                    'status'=>1,
                    'is_delete'=>0
                    );
                $list=M('Content')
                    ->field('id,addtime')
                    ->where($sitemap_map)
                    ->order('id desc')
                    ->select();
                // 生成sitemap文件
                $sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<urlset>\r\n";
                foreach($list as $k=>$v){
                    $sitemap .= "    <url>\r\n"."        <loc>".U('Home/Index/content',array('id'=>$v['id']),'',true)."</loc>\r\n"."        <lastmod>".date('Y-m-d',$v['addtime'])."</lastmod>\r\n        <changefreq>weekly</changefreq>\r\n        <priority>0.8</priority>\r\n    </url>\r\n";
                }
                $sitemap .= '</urlset>';
                file_put_contents('./sitemap.xml',$sitemap);
                return $id;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    // 修改数据
    public function editData(){
        // 获取post数据
        $data=I('post.');
        // 反转义为下文的 preg_replace使用
        $data['content']=htmlspecialchars_decode($data['content']);
        // 判断是否修改表单中图片的默认的alt 和title
        $image_title_alt_word=C('IMAGE_TITLE_ALT_WORD');
        if(!empty($image_title_alt_word)){
            // 修改图片默认的title和alt
            $data['content']=preg_replace('/title=\"(?<=").*?(?=")\"/','title=""',$data['content']);
            $data['content']=preg_replace('/alt=\"(?<=").*?(?=")\"/','alt=""',$data['content']);
        }
        // 将绝对路径转换为相对路径
        $data['content']=preg_replace('/src=\"^\/.*\/Upload\/image\/ueditor$/','src="/Upload/image/ueditor',$data['content']);
        $data['content']=htmlspecialchars($data['content']);
        if($this->create($data)){
            $id=$data['id'];
            $this->where(array('id'=>$id))->save();
            $image_path=get_ueditor_image_path($data['content']);
            D('ArticleTag')->deleteData($id);
            if(isset($data['tids'])){
                D('ArticleTag')->addData($id,$data['tids']);
            }
            // 删除图片路径
            D('ArticlePic')->deleteData($id);
            if(!empty($image_path)){
                if(C('WATER_TYPE')!=0){
                    foreach ($image_path as $k => $v) {
                        add_water('.'.$v);
                    }
                }
                // 添加新图片路径
                D('ArticlePic')->addData($id,$image_path);
            }
            return true;
        }else{
            return false;
        }
    }

    // 彻底删除
    public function deleteData(){
        $id=I('get.id',0,'intval');
        D('ArticlePic')->deleteData($id);
        D('ArticleTag')->deleteData($id);
        $this->where(array('id'=>$id))->delete();
        return true;
    }

    /**
     * 获得表单分页数据
     * @param strind $cid 分类id 'all'为全部分类
     * @param strind $tid 标签id 'all'为全部标签
     * @param strind $is_show   是否显示 1为显示 0为显示
     * @param strind $is_delete 状态 1为删除 0为正常
     * @param strind $limit 分页条数
     * @return array $data 分页样式 和 分页数据
     */
    public function getPageData($cid='all',$tid='all',$is_show='1',$is_delete=0,$limit=10){
        if($cid=='all' && $tid=='all'){
            // 获取全部分类、全部标签下的表单
            if($is_show=='all'){
                $where=array(
                    'is_delete'=>$is_delete
                    );
            }else{
                $where=array(
                    'is_delete'=>$is_delete,
                    'status'=>$is_show
                    );
            }
            $count=$this
                ->where($where)
                ->count();
            $page=new \Org\Bjy\Page($count,$limit);
            $list=$this
                ->where($where)
                ->order('addtime desc')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
            $extend=array(
                'type'=>'index',
                'id'=>0
                );
        }elseif ($cid=='all' && $tid!='all') {
            // 获取tid下的全部表单
            if($is_show=='all'){
                $where=array(
                    'at.tid'=>$tid,
                    'a.is_delete'=>$is_delete
                    );
            }else{
                $where=array(
                    'at.tid'=>$tid,
                    'a.is_delete'=>$is_delete,
                    'a.status'=>$is_show
                    );
            }
            $count=M('article_tag')
                ->alias('at')
                ->join('__ARTICLE__ a ON at.id=a.id')
                ->where($where)
                ->count();
            $page=new \Org\Bjy\Page($count,$limit);
            $list=M('article_tag')
                ->alias('at')
                ->join('__ARTICLE__ a ON at.id=a.id')
                ->where($where)
                ->order('a.addtime desc')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
            $extend=array(
                'type'=>'tid',
                'id'=>$tid
                );
        }elseif ($cid!='all' && $tid=='all') {
            // 获取cid下的全部表单
            if($is_show=='all'){
                $where=array(
                    'cid'=>$cid,
                    'is_delete'=>$is_delete,
                    );
            }else{
                $where=array(
                    'cid'=>$cid,
                    'is_delete'=>$is_delete,
                    'status'=>$is_show
                    );
            }
            $count=$this
                ->where($where)
                ->count();
            $page=new \Org\Bjy\Page($count,$limit);
            $list=$this
                ->where($where)
                ->order('addtime desc')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
            $extend=array(
                'type'=>'cid',
                'id'=>$cid
                );
        }
        $show=$page->show();
        foreach ($list as $k => $v) {
            $list[$k]['addtime']=word_time($v['addtime']);
            $list[$k]['tag']=D('ArticleTag')->getDataByAid($v['id'],'all');
            $list[$k]['pic_path']=D('ArticlePic')->getDataByAid($v['id']);
            $list[$k]['category']=current(D('Category')->getDataByCid($v['cid'],'cid,cid,cname'));
            $v['content']=preg_ueditor_image_path($v['content']);
            $list[$k]['content']=htmlspecialchars($v['content']);
            $list[$k]['url']=U('Home/Index/content/',array('id'=>$v['id']));
            $list[$k]['extend']=$extend;
        }
        $data=array(
            'page'=>$show,
            'data'=>$list,
            );
        return $data;
    }

    // 传递id获取单条全部数据 $map 主要为前台页面上下页使用
    public function getDataByid($id,$map=''){
        if($map==''){
            // $map 为空则不获取上下篇表单
            $data=$this->where(array('id'=>$id))->find();
            // $data['tids']=D('ArticleTag')->getDataByAid($id);
            // $data['tag']=D('ArticleTag')->getDataByAid($id,'all');
            $data['category']=current(D('Category')->getDataByCid($data['cid'],'cid,cid,cname,keywords'));
            // 获取相对路径的图片地址
            $data['content']=preg_ueditor_image_path($data['content']);
        }else{
            if(isset($map['tid'])){
                // 根据此标签tid获取上下篇表单
                $prev_map['at.tid']=$map['tid'];
                $prev_map[]=array('a.is_show'=>1);
                $prev_map[]=array('a.is_delete'=>0);
                $next_map=$prev_map;
                $prev_map['a.aid']=array('gt',$id);
                $next_map['a.aid']=array('lt',$id);
                $data['prev']=$this->field('a.aid,a.title')->alias('a')->join('__ARTICLE_TAG__ at ON a.aid=at.aid')->where($prev_map)->limit(1)->find();
                $data['next']=$this->field('a.aid,a.title')->alias('a')->join('__ARTICLE_TAG__ at ON a.aid=at.aid')->where($next_map)->order('a.aid desc')->limit(1)->find();
            }else if(isset($map['cid'])){
                // 根据此分类cid获取上下篇表单
                $prev_map=$map;
                $prev_map[]=array('status'=>1);
                $prev_map[]=array('is_delete'=>0);
                $next_map=$prev_map;
                $prev_map['id']=array('gt',$id);
                $next_map['id']=array('lt',$id);
                $data['prev']=$this->field('id,title')->where($prev_map)->limit(1)->find();
                $data['next']=$this->field('id,title')->where($next_map)->order('aid desc')->limit(1)->find();
            }else{
                // 根据搜索词获取上下篇表单
                $prev_map=array('title'=>array('like','%'.$map['title'].'%'));
                $prev_map[]=array('status'=>1);
                // $prev_map[]=array('is_delete'=>0);
                $next_map=$prev_map;
                $prev_map['id']=array('gt',$id);
                $next_map['id']=array('lt',$id);
                $data['prev']=$this->field('id,title')->where($prev_map)->limit(1)->find();
                $data['next']=$this->field('id,title')->where($next_map)->order('aid desc')->limit(1)->find();
            }
            // 如果不为空 添加url
            if(!empty($data['prev'])){
                $data['prev']['url']=U('Home/Index/content/',array('id'=>$data['prev']['id']));
            }
            if(!empty($data['next'])){
                $data['next']['url']=U('Home/Index/content/',array('id'=>$data['next']['id']));
            }
            $data['current']=$this->where(array('id'=>$id))->find();
            $data['current']['tids']=D('ArticleTag')->getDataByAid($id);
            $data['current']['tag']=D('ArticleTag')->getDataByAid($id,'all');
            $data['current']['category']=current(D('Category')->getDataByCid($data['current']['cid'],'cid,cid,cname,keywords'));
            $data['current']['content']=preg_ueditor_image_path($data['current']['content']);
        }
        return $data;
    }


    // 传递cid获得此分类下面的表单数据
    // is_all为true时获取全部数据 false时不获取is_show为0 和is_delete为1的数据
    public function getDataByCid($cid,$is_all=false){
        if($is_all){
            return $this->order('addtime desc')->select();
        }else{
            $where=array(
                'cid'=>$cid,
                'status'=>1,
            );
            return $this->where($where)->order('addtime desc')->select();
        }

    }

    // 传递$map获取count数据
    public function getCountData($map=array()){
        return $this->where($map)->count();
    }

}

