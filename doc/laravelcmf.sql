/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : localhost
 Source Database       : laravelcmf

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : utf-8

 Date: 04/02/2020 22:47:52 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `portrait` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '头像',
  `role_id` int(11) DEFAULT NULL COMMENT '角色ID',
  `login_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '最后登录IP',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态，1正常 2禁止 3删除',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_name_unique` (`name`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='后台用户';

-- ----------------------------
--  Records of `admins`
-- ----------------------------
BEGIN;
INSERT INTO `admins` VALUES ('1', 'JeffreyBool', '1402992668@qq.com', '$2y$10$5xxt1xL4Xahr7AuoM2vcEeCGVm.uyHe/.R4ZHutP8FQvcpHDgsEZ2', null, '1', '1', '127.0.0.1', '1', '2019-11-16 13:00:43', '2020-03-23 01:05:38'), ('2', '张高元', 'admin@admin.com', '$2y$10$5xxt1xL4Xahr7AuoM2vcEeCGVm.uyHe/.R4ZHutP8FQvcpHDgsEZ2', null, '2', '4', '114.240.81.89', '1', '2020-01-10 03:01:08', '2020-03-24 11:14:44'), ('3', '科诺设计', 'zhanggaoyuanchina@163.com', '$2y$10$5xxt1xL4Xahr7AuoM2vcEeCGVm.uyHe/.R4ZHutP8FQvcpHDgsEZ2', null, '3', '2', '114.240.81.89', '1', '2020-01-10 03:02:30', '2020-03-24 11:33:19');
COMMIT;

-- ----------------------------
--  Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `menu_actions`
-- ----------------------------
DROP TABLE IF EXISTS `menu_actions`;
CREATE TABLE `menu_actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '动作名称',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' 动作编号',
  `menu_id` int(10) unsigned DEFAULT NULL COMMENT '菜单ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='菜单动作关联实体';

-- ----------------------------
--  Records of `menu_actions`
-- ----------------------------
BEGIN;
INSERT INTO `menu_actions` VALUES ('1', '新增', 'add', '7', '2019-12-13 03:15:10', '2019-12-27 08:27:04'), ('2', '编辑', 'edit', '7', '2019-12-13 03:15:10', '2019-12-27 08:27:04'), ('3', '删除', 'del', '7', '2019-12-13 03:15:10', '2019-12-27 08:27:04'), ('4', '查询', 'query', '7', '2019-12-13 03:15:10', '2019-12-27 08:27:04'), ('7', '新增', 'add', '3', '2019-12-13 03:16:59', '2019-12-13 03:16:59'), ('8', '编辑', 'edit', '3', '2019-12-13 03:16:59', '2019-12-13 03:16:59'), ('9', '删除', 'del', '3', '2019-12-13 03:16:59', '2019-12-13 03:16:59'), ('10', '查询', 'query', '3', '2019-12-13 03:16:59', '2019-12-13 03:16:59'), ('11', '新增', 'add', '4', '2019-12-13 03:17:49', '2019-12-13 03:17:49'), ('12', '编辑', 'edit', '4', '2019-12-13 03:17:49', '2019-12-13 03:17:49'), ('13', '删除', 'del', '4', '2019-12-13 03:17:49', '2019-12-13 03:17:49'), ('14', '查询', 'query', '4', '2019-12-13 03:17:49', '2019-12-13 03:17:49'), ('15', '新增', 'add', '5', '2019-12-13 03:18:30', '2019-12-13 03:18:30'), ('16', '编辑', 'edit', '5', '2019-12-13 03:18:30', '2019-12-13 03:18:30'), ('17', '删除', 'del', '5', '2019-12-13 03:18:30', '2019-12-13 03:18:30'), ('18', '查询', 'query', '5', '2019-12-13 03:18:30', '2019-12-13 03:18:30'), ('25', '新增', 'add', '6', '2019-12-31 06:26:40', '2019-12-31 06:26:40'), ('26', '编辑', 'edit', '6', '2019-12-31 06:26:40', '2019-12-31 06:26:40'), ('27', '删除', 'del', '6', '2019-12-31 06:26:40', '2019-12-31 06:26:40'), ('28', '查询', 'query', '6', '2019-12-31 06:26:40', '2019-12-31 06:26:40'), ('29', '启用', 'enable', '6', '2020-01-10 03:12:20', '2020-01-10 03:12:20'), ('30', '禁用', 'disable', '6', '2020-01-10 03:12:20', '2020-01-10 03:12:20');
COMMIT;

-- ----------------------------
--  Table structure for `menu_resources`
-- ----------------------------
DROP TABLE IF EXISTS `menu_resources`;
CREATE TABLE `menu_resources` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '资源名称',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '资源编码',
  `menu_id` int(10) unsigned NOT NULL COMMENT '菜单ID',
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '资源请求方式',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '资源请求路径',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='菜单资源关联实体';

-- ----------------------------
--  Records of `menu_resources`
-- ----------------------------
BEGIN;
INSERT INTO `menu_resources` VALUES ('14', '查询菜单数据', 'query', '4', 'GET', 'menus.index', '2019-12-13 03:17:49', '2020-03-23 01:36:29'), ('15', '精确查询菜单数据', 'get', '4', 'GET', 'menus.show', '2019-12-13 03:17:49', '2020-03-23 01:36:29'), ('16', '创建菜单数据', 'create', '4', 'POST', 'menus.store', '2019-12-13 03:17:49', '2020-03-23 01:36:29'), ('17', '更新菜单数据', 'update', '4', 'PUT', 'menus.update', '2019-12-13 03:17:49', '2020-03-23 01:36:29'), ('18', '删除菜单数据', 'delete', '4', 'DELETE', 'menus.destroy', '2019-12-13 03:17:49', '2020-03-23 01:36:29'), ('20', '查询角色数据', 'query', '5', 'GET', 'roles.index', '2019-12-13 03:18:30', '2020-03-23 01:41:34'), ('21', '精确查询角色数据', 'get', '5', 'GET', 'roles.show', '2019-12-13 03:18:30', '2020-03-23 01:41:34'), ('22', '创建角色数据', 'create', '5', 'POST', 'roles.store', '2019-12-13 03:18:30', '2020-03-23 01:41:34'), ('23', '更新角色数据', 'update', '5', 'PUT', 'roles.update', '2019-12-13 03:18:30', '2020-03-23 01:41:34'), ('24', '删除角色数据', 'delete', '5', 'DELETE', 'roles.destroy', '2019-12-13 03:18:30', '2020-03-23 01:41:34'), ('28', '查询日志数据', 'query', '7', 'GET', '/api/v1/logs', '2019-12-27 11:01:32', '2019-12-27 11:01:32'), ('29', '精确查询日志数据', 'get', '7', 'GET', '/api/v1/logs/:id', '2019-12-27 11:01:32', '2019-12-27 11:01:32'), ('30', '创建日志数据', 'create', '7', 'POST', '/api/v1/logs', '2019-12-27 11:01:32', '2019-12-27 11:01:32'), ('31', '更新日志数据', 'update', '7', 'PUT', '/api/v1/logs/:id', '2019-12-27 11:01:32', '2019-12-27 11:01:32'), ('32', '删除日志数据', 'delete', '7', 'DELETE', '/api/v1/logs/:id', '2019-12-27 11:01:33', '2019-12-27 11:01:33'), ('33', '查询用户数据', 'query', '6', 'GET', 'admins.index', '2019-12-31 06:26:40', '2020-03-23 01:44:04'), ('34', '精确查询用户数据', 'get', '6', 'GET', 'admins.show', '2019-12-31 06:26:40', '2020-03-23 01:44:04'), ('35', '创建用户数据', 'create', '6', 'POST', 'admins.store', '2019-12-31 06:26:40', '2020-03-23 01:44:04'), ('36', '更新用户数据', 'update', '6', 'PUT', 'admins.update', '2019-12-31 06:26:40', '2020-03-23 01:44:04'), ('37', '删除用户数据', 'delete', '6', 'DELETE', 'admins.destroy', '2019-12-31 06:26:40', '2020-03-23 01:44:04'), ('38', '启用用户数据', 'enable', '6', 'GET', 'admins.enable', '2020-01-10 03:07:21', '2020-03-23 01:44:04'), ('39', '禁用用户数据', 'disable', '6', 'GET', 'admins.disable', '2020-01-10 03:07:21', '2020-03-23 01:44:04'), ('40', '查询菜单树数据', 'tree', '4', 'GET', 'menus.tree', '2020-03-23 01:37:57', '2020-03-23 01:37:57'), ('41', '查询菜单数据', 'queryMenu', '5', 'GET', 'menus.index', '2020-03-23 01:41:34', '2020-03-23 01:41:34'), ('44', '查询角色数据', 'listRole', '6', 'GET', 'roles.list', '2020-03-24 11:36:23', '2020-03-24 11:36:23');
COMMIT;

-- ----------------------------
--  Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL COMMENT '父级ID',
  `parent_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '父级路径',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '菜单名称',
  `sequence` int(10) unsigned NOT NULL DEFAULT '10000' COMMENT '排序值',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图标',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '访问路由',
  `hidden` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '隐藏菜单: 0:不隐藏, 1:隐藏',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '语言包配置',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='菜单';

-- ----------------------------
--  Records of `menus`
-- ----------------------------
BEGIN;
INSERT INTO `menus` VALUES ('1', null, null, '首页', '10000', 'dashboard', '/dashboard', '0', '2019-12-31 00:30:59', '2019-12-31 00:31:12', 'menu.home'), ('3', null, null, '系统管理', '10002', 'setting', '/system', '0', '2019-12-13 03:18:51', '2019-12-27 11:40:32', 'menu.system'), ('4', '3', null, '菜单管理', '10003', 'solution', '/system/menu', '0', '2019-12-31 00:31:01', '2019-12-31 00:31:06', 'menu.system.menu'), ('5', '3', null, '角色管理', '10004', 'audit', '/system/role', '0', '2019-12-13 03:17:49', '2019-12-13 03:17:49', 'menu.system.role'), ('6', '3', null, '用户管理', '10005', 'user', '/system/user', '0', '2019-12-13 03:18:30', '2019-12-13 03:18:30', 'menu.system.user'), ('7', '3', null, '日志管理', '10006', 'bug', '/system/log', '0', '2019-12-27 08:25:25', '2019-12-27 08:43:03', 'menu.system.log');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2016_06_01_000001_create_oauth_auth_codes_table', '1'), ('2', '2016_06_01_000002_create_oauth_access_tokens_table', '1'), ('3', '2016_06_01_000003_create_oauth_refresh_tokens_table', '1'), ('4', '2016_06_01_000004_create_oauth_clients_table', '1'), ('5', '2016_06_01_000005_create_oauth_personal_access_clients_table', '1'), ('6', '2019_08_19_000000_create_failed_jobs_table', '1'), ('7', '2020_03_21_044413_create_admins_table', '1'), ('8', '2020_03_21_044459_create_menus_table', '1'), ('9', '2020_03_21_044618_create_roles_table', '1'), ('10', '2020_03_21_044752_create_menu_actions_table', '1'), ('11', '2020_03_21_044839_create_menu_resources_table', '1'), ('12', '2020_03_21_044943_create_role_menus_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `oauth_access_tokens`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_access_tokens` VALUES ('010699fcb95b8b9023ce8415c5dce34353819782dfb4373f257e88860344b6458237f819ddd84b9d', '1', '1', null, '[]', '1', '2020-03-24 00:09:38', '2020-03-24 00:09:38', '2020-04-08 00:09:38'), ('02ef09985ee8ccc41468d0f5235ead88740d7e00ef8160ef2969b116d421e8aa09f12be648744a2b', '2', '1', null, '[]', '0', '2020-03-23 16:43:31', '2020-03-23 16:43:31', '2020-04-07 16:43:31'), ('0dcb14ab55a76033efd314501dcc7d9c97026d0d3ffadbae9f3e2aef10736dbb8789783c4764867a', '1', '1', null, '[]', '0', '2020-03-24 00:27:11', '2020-03-24 00:27:11', '2020-04-08 00:27:11'), ('153a89674d2fb6d027bca84c1b073061f03516859954f825574bf3dcf00664f7222baa2ef37b5563', '2', '1', null, '[]', '1', '2020-03-23 01:04:05', '2020-03-23 01:04:05', '2020-04-07 01:04:05'), ('18653a6b02a1ab1536a237a69013746a302dfc9587f2cc331b267fba54595a965db71e1841a3acae', '1', '1', null, '[]', '0', '2020-03-24 00:09:36', '2020-03-24 00:09:36', '2020-04-08 00:09:36'), ('1c9bc3915626bbae35d207dcbaa5cba9250a87d94d33d1bacae33c63473f9bc842c5adb1258d9ccb', '1', '1', null, '[]', '1', '2020-03-24 11:33:46', '2020-03-24 11:33:46', '2020-04-08 11:33:46'), ('218a5480a732e1216ed3473f1663a636bb652f7ac037cd7f5e2e408f770e46930a8448be4b1472be', '1', '1', null, '[]', '1', '2020-03-24 00:29:26', '2020-03-24 00:29:26', '2020-04-08 00:29:26'), ('24d005196d270c69707131349c51cc528f6c16382850b4c65841e07f26cf37046c5ef95cea9d695e', '1', '1', null, '[]', '1', '2020-03-24 00:23:49', '2020-03-24 00:23:49', '2020-04-08 00:23:49'), ('2607d787cdefec97040856f0b55c241062936228aba69c8d11d6c6a771a214e388e890195efdb423', '1', '1', null, '[]', '1', '2020-03-24 00:27:14', '2020-03-24 00:27:14', '2020-04-08 00:27:14'), ('298c0c56b57d50cabeec24e778df8ea47f3ad0bd693bf9b0910e4b739f53e5b693d47a6600b56855', '1', '1', null, '[]', '0', '2020-03-24 11:33:45', '2020-03-24 11:33:45', '2020-04-08 11:33:45'), ('2e19b9bf2c6a5b2a09de47aaf47724ba13cdb04256c530b110087233542914975be5f69625a3119c', '2', '1', null, '[]', '1', '2020-03-24 00:00:22', '2020-03-24 00:00:22', '2020-04-08 00:00:22'), ('30e134428e8e707f1cf6bc8a9c8a42bb98b30864f3aa4d53cc346538b56f49b562d27c71c6eb1f7a', '1', '1', null, '[]', '0', '2020-03-24 00:24:43', '2020-03-24 00:24:43', '2020-04-08 00:24:43'), ('31271d36b731277cc6229d72e53001030137c7ff6be3c2fe06d66ebe0a8c21fd50533c0c79cc56e2', '1', '1', null, '[]', '1', '2020-03-24 00:20:16', '2020-03-24 00:20:16', '2020-04-08 00:20:16'), ('37371a29fe92815fda82a0f20c15e824e83fc6a10dd7abc097249fe8641a02c1ca78e821396ba3b7', '2', '1', null, '[]', '1', '2020-03-23 01:45:00', '2020-03-23 01:45:00', '2020-04-07 01:45:00'), ('3bfc53cfd97f2e096e04b130f8b250b429cfab11af489ffc9a4ac5e61c6db2705f32748107f583df', '1', '1', null, '[]', '1', '2020-03-24 00:21:32', '2020-03-24 00:21:32', '2020-04-08 00:21:32'), ('3c7babd37b82eeaf2fbc04e212312a94671ac2b8c821a5f0aa4d932ac91db7387f1a931d7b6920f5', '2', '1', null, '[]', '1', '2020-03-24 00:15:32', '2020-03-24 00:15:32', '2020-04-08 00:15:32'), ('3e341b5d3eb1bf445604976cd3dde49e6972e8108d4be1a94137f636e8e4cb2e4d6f1eda6c876e13', '3', '1', null, '[]', '0', '2020-03-24 11:34:47', '2020-03-24 11:34:47', '2020-04-08 11:34:47'), ('3f39654e126f9ae106f3b572ede06ec7cc818335015a428da603bc2fb692669b8264bcb2323c3d27', '2', '1', null, '[]', '1', '2020-03-23 23:54:58', '2020-03-23 23:54:58', '2020-04-07 23:54:58'), ('421dfd24d51423381a1f106242536fbc4514e5b1739314cbea594aad5b27e53f525da34815e7b9a9', '1', '1', null, '[]', '0', '2020-03-24 00:33:06', '2020-03-24 00:33:06', '2020-04-08 00:33:06'), ('47fd575d48b1aa469bfe6ca403471f7ffdf40e52081c24b6d61e49c0565a58dbbd632ac8f5988d6e', '3', '1', null, '[]', '1', '2020-03-24 11:34:49', '2020-03-24 11:34:49', '2020-04-08 11:34:49'), ('49a60c24c2cede57cb7bc8e36011192a59403b7eb154fa0fd53570c93fdf4e3fd5f36af4974ce1f5', '1', '1', null, '[]', '1', '2020-03-23 23:13:58', '2020-03-23 23:13:58', '2020-04-07 23:13:58'), ('4c4ae3873161dd1dcdd084a4ff06589d15983a57a7e815bcb7e1e7682cefa6ff0cd6a258a90009bb', '1', '1', null, '[]', '1', '2020-03-24 00:32:55', '2020-03-24 00:32:55', '2020-04-08 00:32:55'), ('53333223cafe80c00da17249acfb5d228a2e4cd9745f85350292966180a62ac0da339ba703da2671', '1', '1', null, '[]', '0', '2020-04-02 22:44:46', '2020-04-02 22:44:46', '2020-04-17 22:44:46'), ('53b046b1b9811f3641d3921947f7d71f89b7647865476eb45c320707d1e7fa2f248349aa2b011cd2', '1', '1', null, '[]', '1', '2020-03-24 00:31:16', '2020-03-24 00:31:16', '2020-04-08 00:31:16'), ('551094e889d3dd45add9888f1ef7c3df9b7a49b5e4b9567b0a5067161a4598e845bb20ec68006ec9', '1', '1', null, '[]', '0', '2020-03-24 00:45:29', '2020-03-24 00:45:29', '2020-04-08 00:45:29'), ('56ef48642d9996467988d67d158563e0fcca096d9060f54ec34efcf7af59eaae378987c93c8aa976', '1', '1', null, '[]', '1', '2020-03-24 00:15:11', '2020-03-24 00:15:11', '2020-04-08 00:15:11'), ('5c40bc976b0621d8e467e9fe61879831e175ea54589765b801c0fac13a6f8a5484a3130755158109', '1', '1', null, '[]', '1', '2020-03-23 01:02:48', '2020-03-23 01:02:48', '2020-04-07 01:02:48'), ('639b2a1bad3b13b6977085e1245a3882a6316b336dca08c116655ce0a9b3ca75cbc400de2464694d', '1', '1', null, '[]', '0', '2020-03-23 01:25:39', '2020-03-23 01:25:39', '2020-04-07 01:25:39'), ('659d7fa068f29351260c6432cd2abc4727f0818793fefe5aa2eff9986e70db3d24c8a8364263f975', '1', '1', null, '[]', '1', '2020-03-24 00:41:04', '2020-03-24 00:41:04', '2020-04-08 00:41:04'), ('6a2ad8ea619ae6b2ae0fb95f540f3adea5ac441fe00293d3f9439071fc1b8229c1e592b94a72d4ae', '1', '1', null, '[]', '1', '2020-03-23 16:42:44', '2020-03-23 16:42:44', '2020-04-07 16:42:44'), ('722539c99269a1c33daa0dd1564af2d1730464f9232a16276c7e71c13f3b95ed93b0c4f08b8d3341', '1', '1', null, '[]', '1', '2020-03-24 00:14:38', '2020-03-24 00:14:38', '2020-04-08 00:14:38'), ('74ff7cfbcc1e398b975411d914e5ad43fa18df0fe2d9265f2c35b4429e1629a2a4f5f1b68c091402', '1', '1', null, '[]', '1', '2020-03-24 00:18:30', '2020-03-24 00:18:30', '2020-04-08 00:18:30'), ('79fe32a71fc82aa16f2d2b7d1c61a8b113521f750cede953ae2255ed905365e4c5aa2addae7100ab', '1', '1', null, '[]', '1', '2020-03-24 11:35:45', '2020-03-24 11:35:45', '2020-04-08 11:35:45'), ('7af3a57db6c1c657949d9c66f4ee5689e7f726579e3043b6d875855222a454dab397df4f2afebd4c', '1', '1', null, '[]', '0', '2020-03-23 16:42:42', '2020-03-23 16:42:42', '2020-04-07 16:42:42'), ('7bc6ae874a7c5834e6ad7af76fe87f0ef3ba848658ea83a22b64382c3d98c7d1b944d1f1eb02b8cf', '2', '1', null, '[]', '1', '2020-03-23 16:43:33', '2020-03-23 16:43:33', '2020-04-07 16:43:33'), ('7eabf5562e96e245487a7fd50250cd57d4e2b8220edd07d983cb7637a60e9966026684f7d7589bfa', '1', '1', null, '[]', '0', '2020-03-24 00:42:42', '2020-03-24 00:42:42', '2020-04-08 00:42:42'), ('860b68d72b83ba04935127300f3544b74b6dc1245677a9182c7cd13c072008a5ba5d8cf7535ce85a', '1', '1', null, '[]', '0', '2020-03-24 01:21:57', '2020-03-24 01:21:57', '2020-04-08 01:21:57'), ('8a0ae9d9cab8cdfede336104f4672d5509a4640c4f2eee67b75703fbf6c278d73dae5450453607d1', '1', '1', null, '[]', '0', '2020-03-23 23:55:53', '2020-03-23 23:55:53', '2020-04-07 23:55:53'), ('8bf13869b0bb7b04f9af8bbb112d86d4e208019f8d4999f6594bf7befcc606bdab5d5b5eeb8a3c5d', '1', '1', null, '[]', '1', '2020-03-24 00:12:10', '2020-03-24 00:12:10', '2020-04-08 00:12:10'), ('8cbf0851717c95782640edf0da5c0a7c30d2033f05b885da8909484ad61281e908eefe3a1c6195e1', '1', '1', null, '[]', '0', '2020-03-23 23:12:27', '2020-03-23 23:12:27', '2020-04-07 23:12:27'), ('8cea3d2a6af8a91bdbbf366c081aa16a17e3eb5dd689d9f9adc7f47e0fc2852a32652a541f971160', '1', '1', null, '[]', '0', '2020-03-21 15:09:58', '2020-03-21 15:09:58', '2020-04-05 15:09:58'), ('8e88f148a595f0c14e6d1aecd215c83528e4e4b7b20b5eefa3813850eb0e6e1449c9bc0c2f5d79c1', '1', '1', null, '[]', '1', '2020-03-24 01:42:11', '2020-03-24 01:42:11', '2020-04-08 01:42:11'), ('94ca046ca083b109986ccd36a4111e1e6776f2f5ca3d2aa7b52afd3ed88bf80c55ee68ecde8494b4', '2', '1', null, '[]', '1', '2020-03-23 23:56:27', '2020-03-23 23:56:27', '2020-04-07 23:56:27'), ('9a751e51cadea52d0d998d970ce9cec449b808a9beb87932e0e12282a1ebcfc40985e500b67bd0a1', '1', '1', null, '[]', '1', '2020-03-24 00:28:26', '2020-03-24 00:28:26', '2020-04-08 00:28:26'), ('9cef8b1d7940e9f475df98d974f44958cf3757922f6b6895780e0f7fc90fa2b02beb0ae925e86582', '1', '1', null, '[]', '1', '2020-03-23 01:25:41', '2020-03-23 01:25:41', '2020-04-07 01:25:41'), ('9db321088c57700e3427a47d5561e946aaeb82325da99eb96b998f069f67bb6cef04074c0a20c6ac', '1', '1', null, '[]', '0', '2020-03-23 01:01:41', '2020-03-23 01:01:41', '2020-04-07 01:01:41'), ('9e8feeb8a1ece41e44b1d16c32f28604e4085b033e9b4612da37c4839ccab9481712b8b263a2d0c5', '3', '1', null, '[]', '0', '2020-03-24 11:33:29', '2020-03-24 11:33:29', '2020-04-08 11:33:29'), ('a1b9f613aa37824957ccee09c9a4d1806986d9d41c68a532ac688e4bfa1d63b57472269b63b99ac3', '3', '1', null, '[]', '1', '2020-03-24 11:33:31', '2020-03-24 11:33:31', '2020-04-08 11:33:31'), ('a2f9215c794299b66a5d8c55c2a2247351e6a9b3ee8fde99c25d7c93911374093be4ffc9f60d79cf', '2', '1', null, '[]', '0', '2020-03-23 12:30:39', '2020-03-23 12:30:39', '2020-04-07 12:30:39'), ('a4dcd7784a893179382584b2216b967cd24534c089c3894d7ae40fa659227a2eceb276bf9a6b96fe', '1', '1', null, '[]', '0', '2020-03-23 01:01:44', '2020-03-23 01:01:44', '2020-04-07 01:01:44'), ('a4fa710841dc7ec3165471f34d2a485860de6ff3dc1b3eef53f6021d7e02037970752853d9497bd5', '1', '1', null, '[]', '0', '2020-03-24 11:33:00', '2020-03-24 11:33:00', '2020-04-08 11:33:00'), ('a92834c7e191a2b301d842ab512025e98da7695552ae017ab965a15367e1ae44393194585887b66a', '1', '1', null, '[]', '0', '2020-03-24 11:35:43', '2020-03-24 11:35:43', '2020-04-08 11:35:43'), ('ac07730ea60eb420c5388beed122aeedfd70e2a0465ffcf9c2fdeedbfb8d160b831e1e0521391bb8', '1', '1', null, '[]', '0', '2020-03-24 00:12:08', '2020-03-24 00:12:08', '2020-04-08 00:12:07'), ('ad34e588ef7b1fa0ec89b00197e7b6a240f6e20307949077ed2d6830adac27782aa88fa1e8dbd981', '1', '1', null, '[]', '0', '2020-03-24 01:37:18', '2020-03-24 01:37:18', '2020-04-08 01:37:18'), ('bc90719b49864f634e882c2ec8cf4f2d3e79e6ad0024b0defaa225bd51da2321aca6e1235615ae44', '1', '1', null, '[]', '0', '2020-03-22 17:47:52', '2020-03-22 17:47:52', '2020-04-06 17:47:52'), ('c3427a8e87083e462f53b1128d23c0390b8468ab869ffed481db15735fe44ca1753c191cdb1f8816', '1', '1', null, '[]', '1', '2020-03-24 00:28:08', '2020-03-24 00:28:08', '2020-04-08 00:28:08'), ('c5c68e6e1964baa5da52c980c05788b97b2573caea690681f167f1b61e88d4c6d4b4480eb78620c9', '1', '1', null, '[]', '0', '2020-03-23 23:59:54', '2020-03-23 23:59:54', '2020-04-07 23:59:54'), ('cb2043ca7e256ca3da88c7445bda5c7fd9a002101d36746321a1d6c51f15042ccbe2466aa0acb733', '2', '1', null, '[]', '0', '2020-03-23 01:04:02', '2020-03-23 01:04:02', '2020-04-07 01:04:02'), ('ccba5956467efd2f1f2e8e47d10733497b46ad7957b86175ee2420be6fcc40a94acbc395fec659ab', '1', '1', null, '[]', '1', '2020-03-24 00:27:58', '2020-03-24 00:27:58', '2020-04-08 00:27:58'), ('d10e3b1a4de8c2f5384690ed0d963c092d0d2cd57aef45c56fa46ef7199b39aebc88a94607b2826b', '2', '1', null, '[]', '0', '2020-03-23 01:44:24', '2020-03-23 01:44:24', '2020-04-07 01:44:24'), ('da05c8a0a2b10cda3d9ce69b1df2e9befad3bcc423ffd8086f3aee486604bd4bd5686a50c413d6d4', '2', '1', null, '[]', '0', '2020-03-23 23:54:56', '2020-03-23 23:54:56', '2020-04-07 23:54:56'), ('db71a8481e288458bfbd5fb326af9f990fe76f6f3150743201c7e724eb12723570605dd08e2abc71', '1', '1', null, '[]', '1', '2020-03-24 00:24:45', '2020-03-24 00:24:45', '2020-04-08 00:24:45'), ('de3d1f5868b1ae097c3c45665e335b647d0939be50f716fa294008b8545d358001e0b33eaa121d73', '1', '1', null, '[]', '1', '2020-03-23 23:59:57', '2020-03-23 23:59:57', '2020-04-07 23:59:57'), ('e0c66fa9a676ed92bf0725ba92893cfeb6001ff8df3653ab91dc15bd8ae31ca39134bf5d524c92ff', '2', '1', null, '[]', '0', '2020-03-23 23:56:25', '2020-03-23 23:56:25', '2020-04-07 23:56:25'), ('e0cceb6c7c43929c44dde3523388bfc97b007107cfcb39e28e621a44f2404040b62e509f7dad327c', '1', '1', null, '[]', '0', '2020-03-24 01:40:44', '2020-03-24 01:40:44', '2020-04-08 01:40:44'), ('ef870656fb495fa0f80dd7b08bedae6d4f9f2a2166319c80a3ed057115cd56b6b10dfef62b8e73d9', '1', '1', null, '[]', '1', '2020-03-24 11:33:02', '2020-03-24 11:33:02', '2020-04-08 11:33:02'), ('f0132880faf3314a1520cfdfa84f65f83b874520bdd87d0ac60225f0e8b24e50ba17d30151e9b024', '3', '1', null, '[]', '0', '2020-03-24 11:37:26', '2020-03-24 11:37:26', '2020-04-08 11:37:26'), ('f05360c66ae3ef8520edf6db5adf976cfae5a680ab7e2e0084a976a7e33f155b2eaf399aa9dfe666', '1', '1', null, '[]', '1', '2020-03-24 00:45:33', '2020-03-24 00:45:33', '2020-04-08 00:45:33'), ('f1906d58d963e02ff99d82a87863ab656f57bcd11965db3a000fd1e9b5589399708c779752bda3c7', '1', '1', null, '[]', '1', '2020-03-23 23:55:54', '2020-03-23 23:55:54', '2020-04-07 23:55:54'), ('f5fe9582a4c31b116d8cbeba642e6aeab208ed79d66f912ab956c93285c055465425f8da633c5d41', '3', '1', null, '[]', '1', '2020-03-24 11:37:28', '2020-03-24 11:37:28', '2020-04-08 11:37:28'), ('f66c47bffaa4f9379d2e4519fe27df3eddc218ea00ff77ef525991948733fa9ec12d4c7e6f095377', '1', '1', null, '[]', '1', '2020-03-24 00:41:55', '2020-03-24 00:41:55', '2020-04-08 00:41:55'), ('fad2eb59e8edb7d8ec4989131718c7fc086f91fc1bac248b1f8ffe147b5f991ac892a5e9a205a2f3', '2', '1', null, '[]', '0', '2020-03-24 00:00:21', '2020-03-24 00:00:21', '2020-04-08 00:00:21');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_auth_codes`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `oauth_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `oauth_clients`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_clients` VALUES ('1', null, 'laravelcmf', 'mwQzqaAaNb6zFmgnPicZLl0WySZLximCcnC57BhQ', 'http://localhost', '0', '1', '0', '2020-03-21 15:08:23', '2020-03-21 15:08:23');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_personal_access_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `oauth_personal_access_clients`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2020-03-21 05:09:44', '2020-03-21 05:09:44');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_refresh_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `oauth_refresh_tokens`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_refresh_tokens` VALUES ('08b8ec4413509a9c8d19fec70d38c23c7c11dc2f440b80b8fa33652e582605c209ab47b6f105d617', 'de3d1f5868b1ae097c3c45665e335b647d0939be50f716fa294008b8545d358001e0b33eaa121d73', '1', '2020-04-22 23:59:57'), ('09ad5fabd19843e9038b42fc55431c250935638a5bdcbeb540bba5dabc24b3d9b26479dcd8cffee2', '3e341b5d3eb1bf445604976cd3dde49e6972e8108d4be1a94137f636e8e4cb2e4d6f1eda6c876e13', '0', '2020-04-23 11:34:47'), ('0faf7de92f2c051e1266b9f8684e505860fd622dac0a2d588006a8da89c5cc378d6d489e0e9ba80d', 'ef870656fb495fa0f80dd7b08bedae6d4f9f2a2166319c80a3ed057115cd56b6b10dfef62b8e73d9', '1', '2020-04-23 11:33:02'), ('1173e704c91190bd0e8712a5cd98bf9e31891a0c6da1b959a87053bd68b38acaf0112935f9637991', 'f5fe9582a4c31b116d8cbeba642e6aeab208ed79d66f912ab956c93285c055465425f8da633c5d41', '1', '2020-04-23 11:37:28'), ('252d3df5eb5bcd55249a96115ba3d5489b6a78e3d880d1d4290327e56477e5488d473eb4a3812523', '53b046b1b9811f3641d3921947f7d71f89b7647865476eb45c320707d1e7fa2f248349aa2b011cd2', '1', '2020-04-23 00:31:16'), ('28253bfe3235bf427329e5ccd5456cf1a59fd06fe152d9e038a17d73540a34edbf8c01451f293fec', 'f05360c66ae3ef8520edf6db5adf976cfae5a680ab7e2e0084a976a7e33f155b2eaf399aa9dfe666', '1', '2020-04-23 00:45:33'), ('29c47251aaaa6f3b2613256eff0d178a6e2976c26fdba5cc7546108bb776c21ba5643c0d76dace63', 'db71a8481e288458bfbd5fb326af9f990fe76f6f3150743201c7e724eb12723570605dd08e2abc71', '1', '2020-04-23 00:24:45'), ('2ae507e3f759a5b2f6fc8e630174a5863abe37cbd3620478b916313ad73c1f0a4d949d18b164a616', '30e134428e8e707f1cf6bc8a9c8a42bb98b30864f3aa4d53cc346538b56f49b562d27c71c6eb1f7a', '0', '2020-04-23 00:24:43'), ('3b58792e3b7d1e69ebeabc223bf39237bc26b6a19888144bc67c3a33b239c31b938f267322808e38', 'd10e3b1a4de8c2f5384690ed0d963c092d0d2cd57aef45c56fa46ef7199b39aebc88a94607b2826b', '0', '2020-04-22 01:44:24'), ('431c53fabce342ae5fca9a5d528a5f2a6a0a0791f6bea788fe63b411d9bf75f3b8776f8d75154ea5', '49a60c24c2cede57cb7bc8e36011192a59403b7eb154fa0fd53570c93fdf4e3fd5f36af4974ce1f5', '1', '2020-04-22 23:13:58'), ('4728060627012217c3fb2d362323813a6375c3731ed446598fca8cef0eed4d1515db3dad80ff7810', 'a2f9215c794299b66a5d8c55c2a2247351e6a9b3ee8fde99c25d7c93911374093be4ffc9f60d79cf', '0', '2020-04-22 12:30:39'), ('496609e4ddd8e07a77cc4eb6fde70f745136f269d70cd49ff25e8d0ac39ca2b482ecdf9f9b1f26ec', 'e0c66fa9a676ed92bf0725ba92893cfeb6001ff8df3653ab91dc15bd8ae31ca39134bf5d524c92ff', '0', '2020-04-22 23:56:25'), ('4cdacd68af0023b12bdd22db8b840600d5de20ce0b3de87d6aae1cb807c92d4c308935547ce3eaa6', '551094e889d3dd45add9888f1ef7c3df9b7a49b5e4b9567b0a5067161a4598e845bb20ec68006ec9', '0', '2020-04-23 00:45:29'), ('4e5a0ca7a88f68c5296a918456be4d4af185f640d47c32bd219b575ab1191667eb2cd639e21a7bb3', '659d7fa068f29351260c6432cd2abc4727f0818793fefe5aa2eff9986e70db3d24c8a8364263f975', '1', '2020-04-23 00:41:04'), ('4e8e0c8b6f6ec90450d566422bea6aad4f7619e32a60cf97872c78f0629f2de40b3051e925ec48de', '218a5480a732e1216ed3473f1663a636bb652f7ac037cd7f5e2e408f770e46930a8448be4b1472be', '1', '2020-04-23 00:29:26'), ('4fcb77e1bbdc6ebdc407b4cc52fb00f946b07d0242f23d115000e812b86913f72397f0eb2d3f962e', 'a92834c7e191a2b301d842ab512025e98da7695552ae017ab965a15367e1ae44393194585887b66a', '0', '2020-04-23 11:35:43'), ('5146de335ae6eda45063c1a275ba9885ed4ecc65a5a87ce975fbd952ef92bb5d6e994d9e540bd315', '74ff7cfbcc1e398b975411d914e5ad43fa18df0fe2d9265f2c35b4429e1629a2a4f5f1b68c091402', '1', '2020-04-23 00:18:30'), ('520f682b69823917976cffe75c93db316674736980d2863df3b257fef63ec1bdfdd0d67ab0c39ae5', '37371a29fe92815fda82a0f20c15e824e83fc6a10dd7abc097249fe8641a02c1ca78e821396ba3b7', '1', '2020-04-22 01:45:00'), ('5be55ff96cf1d136ea96df0aa4e01608e1107d4eaefde8ce2fce4ea00b3263c9178b497da4e5f66b', 'ccba5956467efd2f1f2e8e47d10733497b46ad7957b86175ee2420be6fcc40a94acbc395fec659ab', '1', '2020-04-23 00:27:58'), ('5d109e70e2b8e2226c4b70ad0567d8295a4eacae8b2bfbf519feb4db741f6d6afc3785c098f06f60', '153a89674d2fb6d027bca84c1b073061f03516859954f825574bf3dcf00664f7222baa2ef37b5563', '1', '2020-04-22 01:04:05'), ('646eb643de2a7f8b5da97cb2dcc7750833c7a19bb48cba47106f9f3b126db5546fb4da996e9638ce', 'ad34e588ef7b1fa0ec89b00197e7b6a240f6e20307949077ed2d6830adac27782aa88fa1e8dbd981', '0', '2020-04-23 01:37:18'), ('691fe14733c483cc075bb2a42d728ac0601655d99e3a7b67a85e1dffdfaab7fb949fd2c0afcd7cfc', 'cb2043ca7e256ca3da88c7445bda5c7fd9a002101d36746321a1d6c51f15042ccbe2466aa0acb733', '0', '2020-04-22 01:04:02'), ('7615447a1ff8f586ed5f93281a9da2642c88494aa6d20a7191354539a010b9d83c2d3ad16679b9b1', '7eabf5562e96e245487a7fd50250cd57d4e2b8220edd07d983cb7637a60e9966026684f7d7589bfa', '0', '2020-04-23 00:42:42'), ('7cfae811d02f6798b0f557a0f6f8cfed0a8b0cc7a17bc5545ae2253f27652cbda6ecbbf53de989ed', '421dfd24d51423381a1f106242536fbc4514e5b1739314cbea594aad5b27e53f525da34815e7b9a9', '0', '2020-04-23 00:33:06'), ('7db05b5896c59f2957d7c11460b1fbc9fc456b4c1768b48dd783a4d20b1a46194b5902b210182a01', 'fad2eb59e8edb7d8ec4989131718c7fc086f91fc1bac248b1f8ffe147b5f991ac892a5e9a205a2f3', '0', '2020-04-23 00:00:21'), ('871e0e65fda1ee313913f018f04c0f3d764e7213cfbe9ea197cd62ab2b53fbc0b036fcbf4f2637ce', '9db321088c57700e3427a47d5561e946aaeb82325da99eb96b998f069f67bb6cef04074c0a20c6ac', '0', '2020-04-22 01:01:41'), ('8b248532d95ed7e4f498b4442ea0bb61e2199bcf9b41780dcaf1d17f76d70c512638128f4c7c69f5', '3f39654e126f9ae106f3b572ede06ec7cc818335015a428da603bc2fb692669b8264bcb2323c3d27', '1', '2020-04-22 23:54:58'), ('8ca423f289e7747fb4390b76a208560f2b34ad6ee9386943dab4c4a9d55120bcd43b99f7fa567e9c', 'c5c68e6e1964baa5da52c980c05788b97b2573caea690681f167f1b61e88d4c6d4b4480eb78620c9', '0', '2020-04-22 23:59:54'), ('8d12650b6e4edf7207ce165d15a37ef7bbc931f3a50ae275ed248d1e4cac392166bfadf1a7afac81', 'ac07730ea60eb420c5388beed122aeedfd70e2a0465ffcf9c2fdeedbfb8d160b831e1e0521391bb8', '0', '2020-04-23 00:12:08'), ('8e307ca76e2fd52027ddef0245cd8ada802741e551ff4ccce716b7995d8861d3870fe5bd707d9a17', 'a4fa710841dc7ec3165471f34d2a485860de6ff3dc1b3eef53f6021d7e02037970752853d9497bd5', '0', '2020-04-23 11:33:00'), ('8f62632d212e1bef96abaa3397b8eefc4028fa1d81bc0f981636b87104edc392080b38223a27aaca', '8cea3d2a6af8a91bdbbf366c081aa16a17e3eb5dd689d9f9adc7f47e0fc2852a32652a541f971160', '0', '2020-04-20 15:09:58'), ('959c4bc6d624db9c46a45c1701d8cc8de6f22355710449fe21c3cec42b91b8f7f81723d6abb62ff2', '1c9bc3915626bbae35d207dcbaa5cba9250a87d94d33d1bacae33c63473f9bc842c5adb1258d9ccb', '1', '2020-04-23 11:33:46'), ('973530398817ff8dca9890e1aa7577cdb4299f257236504bcf3cc725daab88665584bf80d75c14ac', 'a1b9f613aa37824957ccee09c9a4d1806986d9d41c68a532ac688e4bfa1d63b57472269b63b99ac3', '1', '2020-04-23 11:33:31'), ('9b4072c684d7013e9154e22785778636797c30d3c75ed40266b053bd329242fc29845d680b98f00f', 'f1906d58d963e02ff99d82a87863ab656f57bcd11965db3a000fd1e9b5589399708c779752bda3c7', '1', '2020-04-22 23:55:54'), ('9e04db34987ec7691872d6f019ef1ff2acf8d4cf02f97e6c1a7a83c4c15c252bcc02ed402d64cf44', '31271d36b731277cc6229d72e53001030137c7ff6be3c2fe06d66ebe0a8c21fd50533c0c79cc56e2', '1', '2020-04-23 00:20:16'), ('9fd58d6700371bf87f0574fa8f94e81d5db62e80cf195b1e73ecf2f09326338ee4313829c5dcec09', '298c0c56b57d50cabeec24e778df8ea47f3ad0bd693bf9b0910e4b739f53e5b693d47a6600b56855', '0', '2020-04-23 11:33:45'), ('a62141e92a6d18119521e7bd3cf92e6fda5c533884c68848909d5ee3cffa9800a198f4c852252942', '6a2ad8ea619ae6b2ae0fb95f540f3adea5ac441fe00293d3f9439071fc1b8229c1e592b94a72d4ae', '1', '2020-04-22 16:42:44'), ('a7b3febac6227fee9b69493b50c09f948d17462a74bc2705334e48877bb1dac9933de0b445f84f4d', '7bc6ae874a7c5834e6ad7af76fe87f0ef3ba848658ea83a22b64382c3d98c7d1b944d1f1eb02b8cf', '1', '2020-04-22 16:43:33'), ('a7d2c366abd93c44af668b0c9cfa7c635133454c6cd1f01078339a99991c68a95dbea1aedd3d26a8', '860b68d72b83ba04935127300f3544b74b6dc1245677a9182c7cd13c072008a5ba5d8cf7535ce85a', '0', '2020-04-23 01:21:57'), ('b4e0786653f0e99d31f6b9cb302cf91d67ad1f9542ed4ad65ce2cfa71c6adf2db17215d42d029b04', 'c3427a8e87083e462f53b1128d23c0390b8468ab869ffed481db15735fe44ca1753c191cdb1f8816', '1', '2020-04-23 00:28:08'), ('bb55a8775a283c724df5167817615049fb7416cc1764d02e8bec1b6e256a28e5ff10a5b8a14852a2', '24d005196d270c69707131349c51cc528f6c16382850b4c65841e07f26cf37046c5ef95cea9d695e', '1', '2020-04-23 00:23:49'), ('bbd0fe1de9a698a5f3c3544a8681ddbe436967297d8381ef15eea1b192c772e218175e1aaacbb4ee', '79fe32a71fc82aa16f2d2b7d1c61a8b113521f750cede953ae2255ed905365e4c5aa2addae7100ab', '1', '2020-04-23 11:35:45'), ('bc1700a675148342612d44d7c3fd77e85a9d70ce94c87ef1f0ee7907ab95a0a6dc8647d38cfca8ce', '5c40bc976b0621d8e467e9fe61879831e175ea54589765b801c0fac13a6f8a5484a3130755158109', '1', '2020-04-22 01:02:48'), ('c10a609afc71a15e9c9042df120f3206231fe5a4607b0a9c1360144e5bf170f3b357b99be9aed4f4', '8cbf0851717c95782640edf0da5c0a7c30d2033f05b885da8909484ad61281e908eefe3a1c6195e1', '0', '2020-04-22 23:12:27'), ('c1de5a836be657dec789c3bc6c99d84c99e94080dc0572b891d31377e941f93ae146a9825b74966d', '639b2a1bad3b13b6977085e1245a3882a6316b336dca08c116655ce0a9b3ca75cbc400de2464694d', '0', '2020-04-22 01:25:39'), ('c3c147b81fb92fe9992a9ef5f5a5d9a6903aa4a068f98c7d96db03adbe24a7d4b5970b6931b9a6d7', 'bc90719b49864f634e882c2ec8cf4f2d3e79e6ad0024b0defaa225bd51da2321aca6e1235615ae44', '0', '2020-04-21 17:47:52'), ('c422bea2aea1aaa3c86b476abb7420dded5cae7a2cf84eaa34d68e690040877e3bc6d6cef74f303b', '9a751e51cadea52d0d998d970ce9cec449b808a9beb87932e0e12282a1ebcfc40985e500b67bd0a1', '1', '2020-04-23 00:28:26'), ('c6bc66bd67e139d10bd1893d2847d9bce221da65eca1d0deade66140acb2977c02500200ce7cbdea', '18653a6b02a1ab1536a237a69013746a302dfc9587f2cc331b267fba54595a965db71e1841a3acae', '0', '2020-04-23 00:09:36'), ('c74ea8acfa632d2cdc54724c117b9f0e310962e691f37c052f8a0034d05bd4759d7d8f488183d4d8', 'f66c47bffaa4f9379d2e4519fe27df3eddc218ea00ff77ef525991948733fa9ec12d4c7e6f095377', '1', '2020-04-23 00:41:55'), ('cc8de5e279175f7f771f8b024a0b38583aec74da80e581eae0a11e18fbb7e3c78507206bbc3b9c1c', '722539c99269a1c33daa0dd1564af2d1730464f9232a16276c7e71c13f3b95ed93b0c4f08b8d3341', '1', '2020-04-23 00:14:38'), ('cc964a61c6408904fe37d3a80758b2f4682b31e118e8f8e1eb09f1a4056969cf130ff97ca99ea7f2', 'da05c8a0a2b10cda3d9ce69b1df2e9befad3bcc423ffd8086f3aee486604bd4bd5686a50c413d6d4', '0', '2020-04-22 23:54:56'), ('ccac6c566de50c37e295ca69c1d4397718ab260b7d8216076f87a6a15cfcb97ec34770efbebd04fd', '0dcb14ab55a76033efd314501dcc7d9c97026d0d3ffadbae9f3e2aef10736dbb8789783c4764867a', '0', '2020-04-23 00:27:11'), ('cd4725a43d0d19d5176ba748992809330fc94047adaa24dabdc1c714f182bb54e1b86112cd03d09e', '56ef48642d9996467988d67d158563e0fcca096d9060f54ec34efcf7af59eaae378987c93c8aa976', '1', '2020-04-23 00:15:11'), ('cd78be19e2ec34134a798dc907941fa35651d6b946f84d64389b682a932e91059a35d10f256dc37e', '7af3a57db6c1c657949d9c66f4ee5689e7f726579e3043b6d875855222a454dab397df4f2afebd4c', '0', '2020-04-22 16:42:42'), ('d19d9809ce969e8dd90395d94f807959245eb490c1cb57363e24e44ac79e01a0ada80be0ec72c46e', '94ca046ca083b109986ccd36a4111e1e6776f2f5ca3d2aa7b52afd3ed88bf80c55ee68ecde8494b4', '1', '2020-04-22 23:56:27'), ('d2a29a872e3c2e988dfce3e2d6bf49e3298fe3c4352c9fbe790e482cdc99c6a2a5a2ec8d85df9495', '8e88f148a595f0c14e6d1aecd215c83528e4e4b7b20b5eefa3813850eb0e6e1449c9bc0c2f5d79c1', '1', '2020-04-23 01:42:11'), ('d2ae8798e942db6dc8b2bcdbbd7db6bbb473f5400260857f18a1fe2c13183921fba9388553a376ef', '47fd575d48b1aa469bfe6ca403471f7ffdf40e52081c24b6d61e49c0565a58dbbd632ac8f5988d6e', '1', '2020-04-23 11:34:49'), ('d310ec860f74268732ef141d0b5021572bec1cc0987d8cdfa32882233a18fea0497f96735c16f91e', 'e0cceb6c7c43929c44dde3523388bfc97b007107cfcb39e28e621a44f2404040b62e509f7dad327c', '0', '2020-04-23 01:40:44'), ('d3536a82de5f7b9544370d6102d62bebc1a6a0ba4dc8f9c9d002b74f69e40f44bb508a845d18f0d2', 'f0132880faf3314a1520cfdfa84f65f83b874520bdd87d0ac60225f0e8b24e50ba17d30151e9b024', '0', '2020-04-23 11:37:26'), ('d5777a0c226433492be8b2714cc84a8f2d0d238569bef815a699f42c6e5ff9f72d08b6167ddda983', '4c4ae3873161dd1dcdd084a4ff06589d15983a57a7e815bcb7e1e7682cefa6ff0cd6a258a90009bb', '1', '2020-04-23 00:32:55'), ('d68f9c7a1023fc1b0dff031b3b79c57cf03d9b1e4985d6a62af61b6c0ec2826eadac8e8ae8e614d7', '8a0ae9d9cab8cdfede336104f4672d5509a4640c4f2eee67b75703fbf6c278d73dae5450453607d1', '0', '2020-04-22 23:55:53'), ('d92e3374eee2f5706a5ee4854cfed2a5f56c9651870dc951ec5611de4a90e6701c9b43db9fb0f3d8', '9cef8b1d7940e9f475df98d974f44958cf3757922f6b6895780e0f7fc90fa2b02beb0ae925e86582', '1', '2020-04-22 01:25:41'), ('d9ea12e9bcd52501f30309513d4017266c1e334e752fb34a0f9ee01ca885b2a3ea58dc4e9aa04a77', '2e19b9bf2c6a5b2a09de47aaf47724ba13cdb04256c530b110087233542914975be5f69625a3119c', '1', '2020-04-23 00:00:22'), ('da56c1a11e6140ac0ed1c8caee3364c0b32845201c6f7269c9c5240d33b59408555adeb7c673a0ae', '3bfc53cfd97f2e096e04b130f8b250b429cfab11af489ffc9a4ac5e61c6db2705f32748107f583df', '1', '2020-04-23 00:21:32'), ('e47b55dda3289623dc12914f3264e9999e09858ed42f50e6131f5ba38694bcc7be1072d861eaf034', '010699fcb95b8b9023ce8415c5dce34353819782dfb4373f257e88860344b6458237f819ddd84b9d', '1', '2020-04-23 00:09:38'), ('e6ffe6f8547619f8f7c3a2acf285307f871df3f7efc183335a98a8a8b2ad2f4fb631317b933ca312', '8bf13869b0bb7b04f9af8bbb112d86d4e208019f8d4999f6594bf7befcc606bdab5d5b5eeb8a3c5d', '1', '2020-04-23 00:12:10'), ('e8b4356d7bdfe0c236c0087d97d6beced5ff3564c31e53b0f349db8eb9da3ebaff8e2006ef66fbe1', '3c7babd37b82eeaf2fbc04e212312a94671ac2b8c821a5f0aa4d932ac91db7387f1a931d7b6920f5', '1', '2020-04-23 00:15:32'), ('e9526d36cfbde418b89f60f216c093dd9461145e3f310af4e6a712302a9d908de33eb973a1b0ca37', '9e8feeb8a1ece41e44b1d16c32f28604e4085b033e9b4612da37c4839ccab9481712b8b263a2d0c5', '0', '2020-04-23 11:33:29'), ('ee10f2de572cdaf33cfa095ce41f626235d723da97520b470cf7110bd372e6e3713bbd9feb2cc4e0', '53333223cafe80c00da17249acfb5d228a2e4cd9745f85350292966180a62ac0da339ba703da2671', '0', '2020-05-02 22:44:46'), ('f5d7585e3782d45d4d5aa50b25b3113ab9b5a829056616e9c97013999b133013a82fb514d2a97428', 'a4dcd7784a893179382584b2216b967cd24534c089c3894d7ae40fa659227a2eceb276bf9a6b96fe', '0', '2020-04-22 01:01:44'), ('f5e05ca3d44206824a48d999ddc4c5a917fff5aaea682757f59178bc8bf3a54a4cf76f781b731d38', '02ef09985ee8ccc41468d0f5235ead88740d7e00ef8160ef2969b116d421e8aa09f12be648744a2b', '0', '2020-04-22 16:43:31'), ('ff80de95f02a71acfb1100ec395ecb75c0283f23e4f843c6b053c1e6bc8a8ec7f267e5a7e7daf03d', '2607d787cdefec97040856f0b55c241062936228aba69c8d11d6c6a771a214e388e890195efdb423', '1', '2020-04-23 00:27:14');
COMMIT;

-- ----------------------------
--  Table structure for `role_menus`
-- ----------------------------
DROP TABLE IF EXISTS `role_menus`;
CREATE TABLE `role_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL COMMENT '角色ID',
  `menu_id` int(10) unsigned NOT NULL COMMENT '菜单ID',
  `action` json DEFAULT NULL COMMENT '动作编号',
  `resource` json DEFAULT NULL COMMENT '资源编号',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_menus_role_id_index` (`role_id`),
  KEY `role_menus_menu_id_index` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `role_menus`
-- ----------------------------
BEGIN;
INSERT INTO `role_menus` VALUES ('1', '1', '1', '[\"add\", \"edit\", \"del\", \"query\", \"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\"]', '2019-12-15 15:19:50', '2019-12-30 16:44:15'), ('2', '1', '2', '[\"add\", \"edit\", \"del\", \"query\", \"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\"]', '2019-12-15 15:19:50', '2019-12-30 16:44:15'), ('3', '1', '3', '[\"add\", \"edit\", \"del\", \"query\", \"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"tree\"]', '2019-12-15 15:19:50', '2019-12-30 16:44:15'), ('4', '1', '4', '[\"add\", \"edit\", \"del\", \"query\", \"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"queryMenu\"]', '2019-12-15 15:19:50', '2019-12-30 16:44:15'), ('5', '1', '5', '[\"add\", \"edit\", \"del\", \"query\", \"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\", \"queryRole\"]', '2019-12-15 15:19:50', '2019-12-30 16:44:15'), ('6', '1', '6', '[\"add\", \"edit\", \"del\", \"query\", \"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\"]', '2019-12-15 15:19:50', '2019-12-30 16:44:15'), ('7', '4', '1', '[]', '[]', '2019-12-30 15:42:03', '2019-12-31 06:27:24'), ('8', '4', '2', '[\"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\"]', '2019-12-30 15:42:03', '2019-12-31 06:27:24'), ('14', '5', '1', '[]', '[]', '2019-12-30 15:50:58', '2019-12-30 15:50:58'), ('15', '6', '2', '[\"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\"]', '2019-12-30 15:51:55', '2019-12-30 15:51:55'), ('16', '7', '3', '[\"add\", \"edit\", \"del\", \"query\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"tree\"]', '2019-12-30 15:52:27', '2019-12-30 15:52:27'), ('17', '8', '2', '[\"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\"]', '2019-12-30 16:34:01', '2019-12-30 16:34:01'), ('19', '1', '7', '[\"add\", \"edit\", \"del\", \"query\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\"]', '2019-12-30 16:41:15', '2019-12-30 16:44:15'), ('20', '2', '1', '[]', '[]', '2019-12-30 16:44:31', '2020-03-24 11:29:11'), ('21', '2', '2', '[\"disable\", \"enable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"disable\", \"enable\"]', '2019-12-30 16:44:31', '2020-03-24 11:29:11'), ('22', '2', '3', '[\"add\", \"edit\", \"del\", \"query\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"tree\"]', '2019-12-31 06:26:00', '2020-03-24 11:29:11'), ('23', '2', '4', '[\"add\", \"edit\", \"del\", \"query\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"tree\"]', '2019-12-31 06:26:00', '2020-03-24 11:29:11'), ('24', '2', '5', '[\"add\", \"edit\", \"del\", \"query\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"queryMenu\"]', '2019-12-31 06:26:00', '2020-03-24 11:29:11'), ('27', '2', '6', '[\"add\", \"edit\", \"del\", \"query\", \"enable\", \"disable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"enable\", \"disable\", \"queryRole\"]', '2020-03-24 00:00:11', '2020-03-24 11:29:11'), ('28', '2', '7', '[\"add\", \"edit\", \"del\", \"query\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\"]', '2020-03-24 00:00:11', '2020-03-24 11:29:11'), ('29', '3', '1', '[]', '[]', '2020-03-24 11:32:43', '2020-03-24 11:34:39'), ('30', '3', '6', '[\"add\", \"edit\", \"query\", \"enable\", \"disable\"]', '[\"query\", \"get\", \"create\", \"update\", \"delete\", \"enable\", \"disable\", \"queryRole\"]', '2020-03-24 11:32:43', '2020-03-24 11:34:39'), ('31', '3', '3', '[\"add\", \"edit\", \"del\", \"query\"]', '[]', '2020-03-24 11:34:39', '2020-03-24 11:34:39');
COMMIT;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '备注',
  `sequence` int(10) unsigned NOT NULL DEFAULT '10000' COMMENT '排序值',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='角色表';

-- ----------------------------
--  Records of `roles`
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('1', '超级管理员', '后台全部权限的用户组', '10000', '2020-03-22 00:06:03', '2020-03-22 00:45:28'), ('2', '管理员', '后台全部权限的用户组', '10000', '2020-03-22 00:07:41', '2020-03-22 00:07:41'), ('3', '运营', null, '1000000', '2020-03-24 11:32:43', '2020-03-24 11:32:43');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
