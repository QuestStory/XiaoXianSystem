/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 5.7.9 : Database - xiaoxiansystem
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xiaoxiansystem` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `xiaoxiansystem`;

/*Table structure for table `collection` */

DROP TABLE IF EXISTS `collection`;

CREATE TABLE `collection` (
  `collector_id` char(10) COLLATE utf8_bin NOT NULL COMMENT '收藏者id',
  `goods_id` char(20) COLLATE utf8_bin NOT NULL COMMENT '闲置id',
  `collect_time` datetime NOT NULL COMMENT '收藏时间',
  PRIMARY KEY (`collector_id`,`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `collection` */

insert  into `collection`(`collector_id`,`goods_id`,`collect_time`) values ('1903011600','20220506115321ulcdzf','2022-05-06 12:39:04'),('1903011600','20220506123205krvnil','2022-05-06 12:40:33'),('1903011600','20220506122858cphmsi','2022-05-06 12:40:28');

/*Table structure for table `goods` */

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `goods_id` char(20) COLLATE utf8_bin NOT NULL COMMENT '闲置物品id',
  `student_id` char(10) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '名称',
  `type` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '分类',
  `keyword` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '关键词',
  `describe` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '描述',
  `price` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '价格',
  `photo` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '图片',
  `contact` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '联系方式',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '状态(0代表发布中,1代表已售出,2代表已下架,3已删除,4黑名单)',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `goods` */

insert  into `goods`(`goods_id`,`student_id`,`name`,`type`,`keyword`,`describe`,`price`,`photo`,`contact`,`state`) values ('20220503232654gbeutw','1903011600','薇尔莉特的壁纸','个人DIY','薇尔莉特 唯美 邮票','作为海岛才发行的邮票，很有纪念价值哦','5元一张','../file/190301160020220503232654rzxotv.png','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211101000092acabcd','1903011601','山地自行车','生活用品','自行车','26寸山地自行车给你飞一般的体验','500','../file/002.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211102000092acadcd','1903011608','路遥《平凡的世界》','书籍','路遥','这是一本描绘黄土高原s3人们的书籍，感人肺腑。','20','../file/003.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211103000092acabcd','1903011603','DDR3内存条','数码','内存条','海力士4G DDR3内存条','85','../file/004.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211104000092acabcd','1903011604','可爱小背包','箱包','背包','可可爱爱小背包，迷迷朔朔惹人爱','12','../file/005.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211105000092acabcd','1903011605','蓝牙鼠标','数码','蓝牙鼠标','简约好用的蓝牙静音鼠标','22','../file/006.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211106000092acabcd','1903011606','TYPE-C 数据线','数码','数据线','你是否正好缺一根数据线了，便宜又实惠哦','5','../file/007.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211108000092acabcd','1903011602','电脑散热器','数码','散热器','客人，给你的爱机降降温吧','20','../file/009.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211109000092acabcd','1903011609','好看的喝水杯','生活用品','杯子','这么好看的杯子，不来一个','10 元','../file/010.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20220506123205krvnil','1903011608','文学少女的毕业','书籍','文学少女 轻文学','多好的学生时代啊，憧憬的未来，暗恋的对象','20 RMB','../file/190301160820220506123205oqtcgx.png','我会在图书馆里等着你',0),('20220506122858cphmsi','1903011608','文学少女的伤心','书籍','文学少女 轻文学','多好的学生时代啊，憧憬的未来，暗恋的对象','20 RMB','../file/190301160820220506122858hwedtu.png','我会在图书馆里等着你',0),('20211127000092acabcd','1903011607','华为nova7充电器','数码','手机，华为','华为40W超级快充充电头一个哟','40','../file/008.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211226000092ackwq0','1903011600','动漫壁纸','数码','漫画','如此精美的照片不来两张吗','20','../file/190301160020211226xe7y.jpg&../file/1903011600202112261bu8.png&../file/190301160020211226ltsh.jpg&../file/190301160020211226ycht.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211222000092ac2ghy','1903011600','唐服','服饰','唯美 仙气','好看的衣服哟','120','../file/190301160020211222fbo5.png','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211221000092acc5xg','1903011600','壁纸','个人DIY','壁纸 二次元 唯美','好看精美的壁纸，你不来一点吗？','12','../file/190301160020211221m9wy.png&../file/190301160020211221y2qa.jpg&../file/190301160020211221z5hn.jpg&../file/190301160020211221tjea.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('202112270135525wtegf','1903011600','你的名字壁纸','个人DIY','舞蹈','经典舞蹈','2','../file/1903011600202112270035525ija2l.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211229103124soaexn','1903011600','测试物品1','个人DIY','测试','1234567\r\n7654321\r\n2345678\r\n8765432','12','../file/190301160020211229103124yhgart.png','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211229103558yzxdlu','1903011600','测试物品2','个人DIY','12','这是一条测试商品，\r\n我只是看他的显示效果 是不是我写的什么就显示什么，所以我要测试一下\r\n因为这很重要\r\nhello welcome to mywolrd！','123','../file/190301160020211229103558mezonq.png','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211229104729yehldv','1903011600','测试物品3','个人DIY','1','苍茫苍天既生我，\r\n其才必有用之所。\r\n前路再远亦须走，\r\n风雨纵大不拟躲。\r\n可期先舍而后得，\r\n当信种因必有果。\r\n莫道功成门难寻，\r\n不在吾右应在左。','1','../file/190301160020211229104729pvhugk.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211229182931gfwhzj','1903011600','绝佳美景壁纸','数码','动漫 画报','第一张：夕阳西下女孩在篮球场边倚立，看着美丽的景色\r\n第二张：在茫茫的夜色中，路灯照亮的那个角落，格外令人夺目\r\n第三张：新年临近，放数盏孔明灯，带着我们的祝福和希望\r\n第四张：我想吟诗一首\r\n    阳台窗边一女孩，\r\n    不知看何揣期待。','20','../file/190301160020211229182931vwqkyj.jpg&../file/190301160020211229182931bvjsfq.jpg&../file/190301160020211229182931xwfpro.jpg&../file/190301160020211229182931doyzps.png','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20211229193904rosmwp','1903011600','可爱女孩的壁纸','数码','动漫','对你唯有惊鸿一瞥，却窥见了一种平淡致远的处世态度，淡罢，淡罢，绝不为万物所主宰，我独逍遥于濯浊之外，蝉蜕去拖累，只愿抱明月而长终。江边一蓑烟草，一片缟素。\r\n\r\n在淼浩无涯的海域，你姗姗而来，飘渺而尽散。绝望的心绪，肠断无声，林暗无阳，思竭无泪，任凭岁月将青丝染白，任凭华颜刻满沧桑，任凭心岭堆雪冰凉，任凭今生廖落魂散，今世亦无憾。','5','../file/190301160020211229193904adrkbv.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20220311154748zpxvwi','1903011600','月色真美','个人DIY','月色真美 壁纸 唯美 梦','月色真美，今天的月色真美（——我喜欢你）','无价之宝','../file/190301160020220311154748wslqig.jpg&../file/190301160020220311154748jbqmwi.jpg&../file/190301160020220311154748migeaw.jpg','在南校区食堂见面细聊，提前电话联系:17502307000',0),('20220506115321ulcdzf','1903011608','文学少女的初恋','书籍','文学少女 轻文学','多好的学生时代啊，憧憬的未来，暗恋的对象','20 RMB','../file/190301160820220506115321dhpagm.png','我会在图书馆里等着你',0),('20220506105745lgajzk','1903011610','笔记本电脑零件','数码','机械硬盘 主板','电脑基本信息\r\n电脑型号	索尼 VGN-Z37D_B 笔记本电脑\r\n处理器	英特尔 酷睿2 双核 P8700 @ 2.53GHz 笔记本处理器\r\n主板	索尼 VAIO\r\n内存	6 GB ( 海力士 DDR3 1066MHz / 海力士 DDR3 1333MHz )\r\n主硬盘	日立 HTS723232L9SA60 ( 320 GB / 7200 转/分 )\r\n主显卡	Nvidia GeForce 9300M GS','要哪拆哪 价格好商量','../file/190301161020220506105745lrecqw.jpg&../file/190301161020220506105745cnvpja.jpg&../file/190301161020220506105745eokfxb.jpg','细节QQ详聊:19030111633',0);

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `manager_id` char(10) COLLATE utf8_bin NOT NULL COMMENT '管理员id',
  `password` char(32) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  PRIMARY KEY (`manager_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `manager` */

insert  into `manager`(`manager_id`,`password`,`name`) values ('2001202101','123456','admin'),('2001202102','123456','我谁啊'),('2001202103','123456','何时到吾上场');

/*Table structure for table `record` */

DROP TABLE IF EXISTS `record`;

CREATE TABLE `record` (
  `record_id` char(10) COLLATE utf8_bin NOT NULL COMMENT '订单记录id',
  `goods_id` char(20) COLLATE utf8_bin NOT NULL COMMENT '闲置id',
  `seller_id` char(10) COLLATE utf8_bin NOT NULL COMMENT '卖家id',
  `buyer_id` char(10) COLLATE utf8_bin NOT NULL COMMENT '买家id',
  `trading_time` datetime DEFAULT NULL COMMENT '买卖时间',
  `is_delete` int(1) NOT NULL DEFAULT '0' COMMENT '软删除',
  PRIMARY KEY (`record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `record` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `student_id` char(10) COLLATE utf8_bin NOT NULL COMMENT '学号id',
  `name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `nickname` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '你还没有设置昵称哦' COMMENT '昵称',
  `password` char(32) COLLATE utf8_bin NOT NULL COMMENT '密码(md5加密)',
  `sex` int(1) NOT NULL COMMENT '性别(0代表女,1代表男)',
  `sign` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '这个人很懒，还没有个性签名哦' COMMENT '个性签名',
  `university` varchar(12) COLLATE utf8_bin NOT NULL DEFAULT '重庆电子工程职业学院' COMMENT '大学',
  `college` varchar(12) COLLATE utf8_bin NOT NULL COMMENT '二级学院',
  `major` varchar(12) COLLATE utf8_bin NOT NULL COMMENT '专业',
  `grade` char(5) COLLATE utf8_bin NOT NULL COMMENT '年级',
  `class` char(5) COLLATE utf8_bin NOT NULL COMMENT '班级',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '状态(0代表正常,1代表黑名单,2代表删除)',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `user` */

insert  into `user`(`student_id`,`name`,`nickname`,`password`,`sex`,`sign`,`university`,`college`,`major`,`grade`,`class`,`state`) values ('1903011600','陈琳','漫天飞雪','7fe143ce68beed4f1d8465abfb3a7e20',0,'我就是我，我就是天下第一','重庆电子工程职业学院','人工智能与大数据学院','软件技术','2019级','1910班',0),('1903011601','李沁','烟花三月','94e81e7afab832dce68b90ad36c2a112',0,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','人工智能与大数据学院','软件技术','2019级','1910班',0),('1903011603','卢元','我就是我','90b146729ef2ba207968a960267606f4',1,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','人工智能与大数据学院','软件技术','2019级','1910班',0),('1903011604','林琨','如果没有如果','98fd4668f792c8a185a3dea5a3c2b654',1,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','财经管理学院','会计','2019级','1901班',0),('1903011605','陈圆圆','圆圆很开心','a614362eef607c454cf6a3ffca85e059',0,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','财经管理学院','会计','2019级','1901班',0),('1903011606','樊芳芳','芳芳最美丽','84c7797ac0c0655152dc2fe45449eb1f',0,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','财经管理学院','会计','2019级','1901班',0),('1903011607','吴昕','梧桐秋雨','58cf458cdaea62169a4fa0694e820fac',1,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','通信工程学院','通信','2019级','1903班',0),('1903011608','冉雨','I 雨','4c5b08342b3ed04c89c89c6ee298c8c8',1,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','通信工程学院','通信','2019级','1903班',0),('1903011609','刘婷婷','婷婷的世界','1aed2cbbc33d1200029ab9ba882515fd',0,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','通信工程学院','通信','2019级','1903班',0),('1903011610','张盼盼','是啊盼啊','a9040f157fd9380cb8bc1c4545471be0',0,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','人工智能与大数据学院','大数据','2020级','2001班',0),('1903011602','秦月','你还没有设置昵称哦','661639cf7bb520e2f0dcfc15cb5ad350',0,'这个人很懒，还没有个性签名哦','重庆电子工程职业学院','人工智能与大数据学院','软件技术','2020级','2010班',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
