
create table tbl_typeleagues
(
	Id bigint AUTO_INCREMENT primary key,
	Name varchar(50) not null
);

-- create table tbl_leagues  
-- (
-- Id bigint AUTO_INCREMENT not null,
-- TypeLeaguesId bigint references tbl_typeLeagues(Id),
-- ClubListOfTypeLeaguesId bigint references tbl_clubList(Id),
-- TableListOfLeaguesId bigint references tbl_TableList(Id),
-- primary key(Id, TypeLeaguesId)
-- );
create table tbl_club
(
	Id bigint AUTO_INCREMENT primary key not null,
	Name varchar(50) not null,
	Logo varchar(50) not null,
	Played bigint,
	Pobigints bigint,
	Won bigint,
	Lost bigint
);

create table tbl_clublistofleagues
(
	Id bigint AUTO_INCREMENT primary key not null,
	TypeLeaguesId bigint not null,	
	ClubId bigint not null,
	CONSTRAINT FOREIGN KEY(TypeLeaguesId) references tbl_typeLeagues(Id),
	CONSTRAINT FOREIGN KEY(ClubId) references tbl_club(Id)
);
create table tbl_tablelistofleagues
(
	Id bigint AUTO_INCREMENT not null,
	TypeLeaguesId bigint not null,
	TableName varchar(50) not null,
	CONSTRAINT FOREIGN KEY(TypeLeaguesId) references tbl_typeLeagues(Id),
	primary key(Id, TypeLeaguesId)
);
create table tbl_clublistoftable
(
	Id bigint AUTO_INCREMENT not null,
	TableListOfLeaguesId bigint not null,	
	ClubId bigint not null,
	CONSTRAINT FOREIGN KEY(TableListOfLeaguesId) references tbl_tableListOfLeagues(Id),
	CONSTRAINT FOREIGN KEY(ClubId) references tbl_club(Id),
	primary key(Id, TableListOfLeaguesId)
);

create table tbl_matchlist
(
	Id bigint AUTO_INCREMENT primary key not null,
	TypeLeaguesId bigint not null,
	TourId bigint,
	ClubA bigint not null,
	ClubB bigint not null,
	CONSTRAINT FOREIGN KEY(TypeLeaguesId) references tbl_typeLeagues(Id),
	CONSTRAINT FOREIGN KEY(ClubA) references tbl_club(Id),
	CONSTRAINT FOREIGN KEY(ClubB) references tbl_club(Id),
	StartTime Datetime,
	Result varchar(10)
);
create table tbl_user
(
	Id bigint AUTO_INCREMENT primary key not null,
	IdFaceBook varchar(50),
	Email varchar(50),
	Password varchar(50),
	FullName varchar(50),
	Avatar varchar(50),
	DOB Datetime,
	Gender bit,
	FavoriteTeam bigint,
	Scores bigint
);
create table tbl_predict
(
	Id bigint AUTO_INCREMENT primary key not null,
	UserId bigint not null,
	MatchId bigint not null,
	predictResult varchar(10) not null,
	CONSTRAINT FOREIGN KEY(UserId) references tbl_user(Id),
	CONSTRAINT FOREIGN KEY(MatchId) references tbl_matchlist(Id)
);

create table tbl_facebook
(
	Id bigint AUTO_INCREMENT primary key not null,
	idFacebook varchar(30) not null,
	FullName varchar(100),
	Avatar varchar(100),
	FavoriteTeam bigint,
    Scores bigint
);

create table tbl_friend
(
	Id bigint AUTO_INCREMENT primary key not null,
	idFace1 varchar(30) not null,
	idFace2 varchar(30) not null
);

create table tbl_groups
(
	Id bigint AUTO_INCREMENT primary key not null,
	ClubId bigint not null,
	CONSTRAINT FOREIGN KEY(ClubId) references tbl_club(Id),
	MemberId bigint,
	CONSTRAINT FOREIGN KEY(MemberId) references tbl_user(Id)
);

INSERT INTO tbl_typeleagues(Name) VALUES('Eredivisie');
INSERT INTO tbl_typeleagues(Name) VALUES('Champions League');
INSERT INTO tbl_typeleagues(Name) VALUES('Top League');
INSERT INTO tbl_typeleagues(Name) VALUES('Jupiler League');


INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 1);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 2);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 3);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 4);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 5);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 6);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 7);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 8);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 9);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(1, 10);

INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 11);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 12);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 13);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 14);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 15);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 1);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 2);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 3);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 4);
INSERT INTO tbl_clublistofleagues(TypeLeaguesId, ClubId) VALUES(2, 5);


INSERT INTO tbl_tablelistofleagues(TypeLeaguesId, TableName) VALUES(2, 'A');
INSERT INTO tbl_tablelistofleagues(TypeLeaguesId, TableName) VALUES(2, 'B');

INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(1, 1);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(1, 2);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(1, 3);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(1, 4);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(1, 5);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(2, 11);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(2, 12);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(2, 13);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(2, 14);
INSERT INTO tbl_clublistoftable(TableListOfLeaguesId, ClubId) VALUES(2, 15);

INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(4,'CSKA','images/resources/team-logo/CSKA.jpg', 23, 55, 18, 4);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(16,'Zenit','images/resources/team-logo/Zenit.jpg', 23, 47, 14, 4);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(3,'Anzhi','images/resources/team-logo/Anzhi.jpg', 23, 43, 12, 4);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(12,'Rubin','images/resources/team-logo/Rubin.jpg', 23, 39, 12, 8);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(5,'Dinamo','images/resources/team-logo/Dinamo.jpg', 23, 38, 12, 9);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(8,'Kuban','images/resources/team-logo/Kuban.jpg', 23, 38, 11, 7);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(14,'Terek','images/resources/team-logo/Terek.jpg', 23, 34, 10, 9);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(13,'Spartak','images/resources/team-logo/Spartak.jpg', 23, 37, 11, 8);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(9,'Lokomotiv','images/resources/team-logo/Lokomotiv.jpg', 23, 33, 9, 8);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(6,'Krasnodar','images/resources/team-logo/Krasnodar.jpg', 23, 35, 10, 8);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(11,'Rostov','images/resources/team-logo/Rostov.jpg', 23, 24, 6, 11);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(7,'KrylyaSovetov','images/resources/team-logo/KryliaSovetov.jpg', 23, 17, 4, 14);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(10,'Mordovia','images/resources/team-logo/Mordovia.jpg', 23, 16, 4, 15);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(1,'Alania','images/resources/team-logo/Alania.jpg', 23, 13, 2, 14);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(2,'Amkar','images/resources/team-logo/Amkar.jpg', 23, 24, 6, 11);
INSERT INTO tbl_club(Id, Name, Logo, Played, Pobigints, Won, Lost) VALUES(15,'Volga','images/resources/team-logo/Volga.jpg', 23, 21, 5, 12);


INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 2, 5, '2013-04-05 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 4, 15, '2013-04-06 14:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 11, 13, '2013-04-06 16:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 9, 14, '2013-04-06 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 16, 7, '2013-04-07 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 3, 1, '2013-04-07 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 8, 12, '2013-04-07 18:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 23, 10, 6, '2013-04-08 19:00', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 5, 4, '2013-04-12 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 9, 16, '2013-04-13 14:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 6, 7, '2013-04-13 16:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 13, 2, '2013-04-13 18:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 14, 8, '2013-04-13 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 15, 3, '2013-04-14 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 12, 11, '2013-04-14 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 24, 1, 10, '2013-04-15 19:00', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 2, 12, '2013-04-19 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 10, 15, '2013-04-20 14:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 7, 1, '2013-04-20 16:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 8, 9, '2013-04-20 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 16, 6, '2013-04-21 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 4, 13, '2013-04-21 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 3, 5, '2013-04-21 18:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 25, 11, 14, '2013-04-22 19:00', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 15, 7, '2013-04-26 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 5, 10, '2013-04-27 14:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 14, 2, '2013-04-27 16:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 9, 11, '2013-04-27 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 8, 16, '2013-04-28 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 12, 4, '2013-04-28 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 13, 3, '2013-04-28 18:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 26, 1, 6, '2013-04-29 19:00', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 10, 13, '2013-05-03 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 16, 1, '2013-05-05 01:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 4, 14, '2013-05-05 02:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 3, 12, '2013-05-05 05:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 7, 5, '2013-05-05 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 6, 15, '2013-05-05 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 2, 9, '2013-05-05 18:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 27, 11, 8, '2013-05-05 20:00', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 12, 10, '2013-05-10 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 13, 7, '2013-05-10 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 5, 6, '2013-05-11 14:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 15, 1, '2013-05-11 16:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 8, 2, '2013-05-11 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 11, 16, '2013-05-12 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 9, 4, '2013-05-12 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 28, 14, 3, '2013-05-12 18:00', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 2, 11, '2013-05-17 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 4, 8, '2013-05-18 14:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 10, 14, '2013-05-18 16:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 6, 13, '2013-05-18 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 16, 15, '2013-05-19 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 7, 12, '2013-05-19 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 1, 5, '2013-05-19 18:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 29, 3, 9, '2013-05-20 20:00', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 2, 16, '2013-05-26 17:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 5, 15, '2013-05-26 14:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 13, 1, '2013-05-26 16:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 9, 10, '2013-05-26 19:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 11, 4, '2013-05-26 13:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 8, 3, '2013-05-26 16:00', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 14, 7, '2013-05-26 18:30', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, TourId, ClubA, ClubB, StartTime, Result) VALUES(1, 30, 12, 6, '2013-05-26 19:00', '');


INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen', 'images/resources/team-logo/Alania.jpg', '1987-02-23 20:20:20', 1, 1, 20);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 1', 'images/resources/team-logo/Amkar.jpg', '1987-03-23 20:20:20', 1, 1, 120);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 2', 'images/resources/team-logo/Anzhi.jpg', '1987-04-23 20:20:20', 1, 1, 220);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 3', 'images/resources/team-logo/CSKA.jpg', '1987-05-23 20:20:20', 1, 1, 320);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 4', 'images/resources/team-logo/Dinamo.jpg', '1987-06-23 20:20:20', 1, 1, 1120);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 5', 'images/resources/team-logo/Krasnodar.jpg', '1987-07-23 20:20:20', 1, 1, 230);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 6', 'images/resources/team-logo/KryliaSovetov.jpg', '1987-08-23 20:20:20', 1, 1, 520);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 7', 'images/resources/team-logo/Kuban.jpg', '1987-09-23 20:20:20', 1, 1, 720);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 8', 'images/resources/team-logo/Lokomotiv.jpg', '1987-10-23 20:20:20', 1, 1, 520);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 9', 'images/resources/team-logo/Mordovia.jpg', '1987-11-23 20:20:20', 1, 1, 320);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 10', 'images/resources/team-logo/Rostov.jpg', '1987-12-23 20:20:20', 1, 1, 220);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 11', 'images/resources/team-logo/Rubin.jpg', '1987-01-24 20:20:20', 1, 1, 120);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 12', 'images/resources/team-logo/Spartak.jpg', '1987-02-24 20:20:20', 1, 1, 120);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 13', 'images/resources/team-logo/Terek.jpg', '1987-03-24 20:20:20', 1, 1, 520);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 14', 'images/resources/team-logo/Volga.jpg', '1987-04-24 20:20:20', 1, 1, 920);
INSERT INTO tbl_user(Email, Password, FullName, Avatar, DOB, Gender, FavoriteTeam, Scores) VALUES('justin@gmail.com','123', 'Justin Nguyen 15', 'images/resources/team-logo/Zenit.jpg', '1987-05-24 20:20:20', 1, 1, 820);