CREATE TABLE sport_system.Event
(
    event_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    event_name varchar(30),
    max_team_member int(11),
    min_team_member int(11),
    team_limit int(11),
    year int(11),
    is_delete int(11) DEFAULT '0'
);
CREATE TABLE sport_system.billboard
(
    ad_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ad_name varchar(100),
    ad_content varchar(100),
    ad_data_time timestamp DEFAULT CURRENT_TIMESTAMP,
    is_delete int(11) DEFAULT '0'
);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (1, 'ds', 'sd', '2018-10-23 05:06:13', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (2, 'dsa', 'dsa', '2018-10-23 05:23:06', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (3, null, null, '2018-10-23 14:51:47', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (4, 'dsdsad', 'dsada', '2018-10-23 14:52:06', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (5, null, null, '2018-10-23 14:53:09', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (6, null, null, '2018-10-23 14:53:37', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (7, null, null, '2018-10-23 14:54:18', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (8, null, null, '2018-10-23 14:54:39', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (9, null, null, '2018-10-23 14:55:16', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (10, null, null, '2018-10-23 14:55:41', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (11, null, null, '2018-10-23 14:56:19', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (12, null, null, '2018-10-23 14:56:24', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (13, null, null, '2018-10-23 14:56:52', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (14, null, null, '2018-10-23 14:57:52', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (15, null, null, '2018-10-23 14:58:11', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (16, null, null, '2018-10-23 14:59:05', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (17, null, null, '2018-10-23 14:59:32', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (18, null, null, '2018-10-23 14:59:51', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (19, null, null, '2018-10-23 15:00:34', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (20, null, null, '2018-10-23 15:01:06', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (21, null, null, '2018-10-23 15:01:36', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (22, null, null, '2018-10-23 15:02:59', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (23, null, null, '2018-10-23 15:03:13', 0);
INSERT INTO sport_system.billboard (ad_id, ad_name, ad_content, ad_data_time, is_delete) VALUES (24, null, null, '2018-10-23 15:03:18', 0);
CREATE TABLE sport_system.department
(
    department_id int(11) PRIMARY KEY NOT NULL,
    grade int(11),
    class int(11),
    department_name varchar(50),
    is_delete int(11) DEFAULT '0'
);
CREATE TABLE sport_system.`match`
(
    match_id int(11) PRIMARY KEY NOT NULL,
    `order` int(11),
    score int(11),
    is_finished int(11),
    vs_time int(11),
    event_id int(11),
    team_id int(11),
    is_delete int(11) DEFAULT '0'
);
CREATE TABLE sport_system.passwd
(
    user_id int(11) PRIMARY KEY NOT NULL,
    password varchar(100),
    is_delete int(11) DEFAULT '0'
);
CREATE UNIQUE INDEX passwd_user_id_uindex ON sport_system.passwd (user_id);
INSERT INTO sport_system.passwd (user_id, password, is_delete) VALUES (20165083, '1998', 0);
CREATE TABLE sport_system.registration
(
    reg_id int(11) PRIMARY KEY NOT NULL,
    team_id int(11),
    event_id int(11),
    create_time datetime,
    is_delete int(11) DEFAULT '0'
);
CREATE TABLE sport_system.team
(
    team_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    team_name varchar(50),
    is_delete int(11) DEFAULT '0',
    CONSTRAINT `PRIMARY` PRIMARY KEY (team_id, user_id)
);
CREATE TABLE sport_system.user
(
    user_id int(11) PRIMARY KEY NOT NULL,
    department_id int(11),
    phone varchar(20),
    gender int(11),
    email varchar(50),
    name varchar(20),
    is_delete int(11) DEFAULT '0',
    is_admin int(11) DEFAULT '0'
);
INSERT INTO sport_system.user (user_id, department_id, phone, gender, email, name, is_delete, is_admin) VALUES (20165083, 1, '13072339523', 1, 'a215900031@gmail.com', '朱世杨', 0, 0);