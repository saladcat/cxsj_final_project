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
CREATE TABLE sport_system.college_name
(
    department_id int(11) PRIMARY KEY NOT NULL,
    department_name varchar(50)
);
CREATE TABLE sport_system.department
(
    department_id int(11) NOT NULL,
    grade int(11) NOT NULL,
    class int(11) NOT NULL,
    is_delete int(11) DEFAULT '0',
    CONSTRAINT `PRIMARY` PRIMARY KEY (department_id, class, grade)
);
CREATE TABLE sport_system.event
(
    event_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    event_name varchar(30),
    max_team_member int(11),
    min_team_member int(11),
    team_limit int(11),
    year int(11),
    is_delete int(11) DEFAULT '0'
);
INSERT INTO sport_system.event (event_id, event_name, max_team_member, min_team_member, team_limit, year, is_delete) VALUES (1, 'ft', null, null, null, null, 0);
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
    reg_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    team_id int(11),
    event_id int(11),
    create_time timestamp DEFAULT CURRENT_TIMESTAMP,
    is_delete int(11) DEFAULT '0'
);
INSERT INTO sport_system.registration (reg_id, team_id, event_id, create_time, is_delete) VALUES (1, 1, 1, null, 0);
INSERT INTO sport_system.registration (reg_id, team_id, event_id, create_time, is_delete) VALUES (2, 2, 1, null, 0);
CREATE TABLE sport_system.team
(
    team_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    is_delete int(11) DEFAULT '0',
    CONSTRAINT `PRIMARY` PRIMARY KEY (team_id, user_id)
);
INSERT INTO sport_system.team (team_id, user_id, is_delete) VALUES (1, 1, 0);
INSERT INTO sport_system.team (team_id, user_id, is_delete) VALUES (1, 2, 0);
INSERT INTO sport_system.team (team_id, user_id, is_delete) VALUES (2, 3, 0);
INSERT INTO sport_system.team (team_id, user_id, is_delete) VALUES (3, 4, 0);
CREATE TABLE sport_system.team_name
(
    team_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    team_name varchar(50),
    is_delete int(11) DEFAULT '0'
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
    is_admin int(11) DEFAULT '0',
    password varchar(100)
);
INSERT INTO sport_system.user (user_id, department_id, phone, gender, email, name, is_delete, is_admin, password) VALUES (1, 1, '1', 1, 'a215900031@gmail', 'zsy1', 0, 0, null);
INSERT INTO sport_system.user (user_id, department_id, phone, gender, email, name, is_delete, is_admin, password) VALUES (2, null, null, null, null, 'zsy2', 0, 0, null);
INSERT INTO sport_system.user (user_id, department_id, phone, gender, email, name, is_delete, is_admin, password) VALUES (3, null, null, null, null, 'zsy3', 0, 0, null);
INSERT INTO sport_system.user (user_id, department_id, phone, gender, email, name, is_delete, is_admin, password) VALUES (4, null, null, null, null, 'zsy4', 0, 0, null);