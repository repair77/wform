# 自定义表单处理系统

## 数据表

 - 分类表
 id,标题,简介,序号,状态(隐藏,显示)
 
 - 内容表
 id,所属分类id,标题,简介,处理文件,访问量,状态(隐藏,显示,推荐)
 
 - 字段表
 id,所属内容id,序号,字段类型(单行文本,多行文本,单选,多选,日期,图片),备选

 内容对应一个分类 和 多个字段


 后台功能:
 分类添加,分类管理,分类编辑,
 
 内容添加,内容管理,内容编辑,删除内容

 内容添加和编辑时,可以随意增删内容的字段项目





