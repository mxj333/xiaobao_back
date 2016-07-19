<?php
//ADDS CONFIGURE TO ALL VIEWS
class_alias('Cake\Core\Configure', 'Configure');

//LOAD PLUGINS
//CakePlugin::load('DebugKit');

//CUSTOM VALUES
Configure::write('BASE_URL', 'http://dev.dequanyuan.com.cn');
Configure::write('site_title', '德泉缘');
Configure::write('sub_title', '北京德泉缘古钱币艺术品鉴定有限公司');
Configure::write('metadescription', '北京德泉缘古钱币艺术品鉴定有限公司');
Configure::write('metakeywords', '北京德泉缘古钱币艺术品鉴定有限公司');

//单选题数量
Configure::write('single_selection', 3);

//多选题数量
Configure::write('multiselect', 5);

//判断题数量
Configure::write('judgement', 2);

include('functions.php');