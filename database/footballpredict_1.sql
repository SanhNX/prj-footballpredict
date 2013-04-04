create database footballpredict;
use footballpredict;

create table tbl_typeLeagues
(
	Id int AUTO_INCREMENT primary key,
	Name varchar(50) not null
);

-- create table tbl_leagues  
-- (
-- Id int AUTO_INCREMENT not null,
-- TypeLeaguesId int references tbl_typeLeagues(Id),
-- ClubListOfTypeLeaguesId int references tbl_clubList(Id),
-- TableListOfLeaguesId int references tbl_TableList(Id),
-- primary key(Id, TypeLeaguesId)
-- );
create table tbl_club
(
	Id int AUTO_INCREMENT primary key not null,
	Name varchar(50) not null,
	Logo varchar(50) not null,
	Played int,
	Points int,
	Won int,
	Lost int
);
create table tbl_clubListOfLeagues
(
	Id int AUTO_INCREMENT primary key not null,
	TypeLeaguesId int not null,	
	ClubId int not null,
	CONSTRAINT FOREIGN KEY(TypeLeaguesId) references tbl_typeLeagues(Id),
	CONSTRAINT FOREIGN KEY(ClubId) references tbl_club(Id)
);
create table tbl_tableListOfLeagues
(
	Id int AUTO_INCREMENT not null,
	TypeLeaguesId int not null,
	TableName varchar(50) not null,
	CONSTRAINT FOREIGN KEY(TypeLeaguesId) references tbl_typeLeagues(Id),
	primary key(Id, TypeLeaguesId)
);
create table tbl_clubListOfTable
(
	Id int AUTO_INCREMENT not null,
	TableListOfLeaguesId int not null,	
	ClubId int not null,
	CONSTRAINT FOREIGN KEY(TableListOfLeaguesId) references tbl_tableListOfLeagues(Id),
	CONSTRAINT FOREIGN KEY(ClubId) references tbl_club(Id),
	primary key(Id, TableListOfLeaguesId)
);

create table tbl_matchlist
(
	Id int AUTO_INCREMENT primary key not null,
	TypeLeaguesId int not null,
	ClubA int not null,
	ClubB int not null,
	CONSTRAINT FOREIGN KEY(TypeLeaguesId) references tbl_typeLeagues(Id),
	CONSTRAINT FOREIGN KEY(ClubA) references tbl_club(Id),
	CONSTRAINT FOREIGN KEY(ClubB) references tbl_club(Id),
	StartTime Datetime,
	Result varchar(10)
);
create table tbl_user
(
	Id int AUTO_INCREMENT primary key not null,
	Email varchar(50) not null,
	Password varchar(50) not null,
	FullName varchar(50) not null,
	Avatar varchar(50),
	DOB Datetime,
	Gender bit,
	FavoriteTeam int,
	Scores int
);
create table tbl_predict
(
	Id int AUTO_INCREMENT primary key not null,
	UserId int not null,
	MatchId int not null,
	predictResult varchar(10) not null,
	CONSTRAINT FOREIGN KEY(UserId) references tbl_user(Id),
	CONSTRAINT FOREIGN KEY(MatchId) references tbl_matchlist(Id)
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

INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(1, 1);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(1, 2);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(1, 3);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(1, 4);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(1, 5);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(2, 11);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(2, 12);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(2, 13);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(2, 14);
INSERT INTO tbl_clubListOfTable(TableListOfLeaguesId, ClubId) VALUES(2, 15);

INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Alania','images/resources/team-logo/Alania.jpg', 5, 230, 4, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Amkar','images/resources/team-logo/Amkar.jpg', 6, 230, 5, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Anzhi','images/resources/team-logo/Anzhi.jpg', 7, 230, 6, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('CSKA','images/resources/team-logo/CSKA.jpg', 8, 230, 7, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Dinamo','images/resources/team-logo/Dinamo.jpg', 9, 230, 8, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Krasnodar','images/resources/team-logo/Krasnodar.jpg', 10, 230, 9, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('KryliaSovetov','images/resources/team-logo/KryliaSovetov.jpg', 20, 230, 19, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Kuban','images/resources/team-logo/Kuban.jpg', 11, 230, 10, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Lokomotiv','images/resources/team-logo/Lokomotiv.jpg', 12, 230, 11, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Mordovia','images/resources/team-logo/Mordovia.jpg', 13, 230, 12, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Rostov','images/resources/team-logo/Rostov.jpg', 14, 230, 13, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Rubin','images/resources/team-logo/Rubin.jpg', 15, 230, 14, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Spartak','images/resources/team-logo/Spartak.jpg', 16, 230, 15, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Terek','images/resources/team-logo/Terek.jpg', 17, 230, 16, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Volga','images/resources/team-logo/Volga.jpg', 18, 230, 17, 1);
INSERT INTO tbl_club(Name, Logo, Played, Points, Won, Lost) VALUES('Zenit','images/resources/team-logo/Zenit.jpg', 19, 230, 18, 1);


INSERT INTO tbl_matchlist(TypeLeaguesId, ClubA, ClubB, StartTime, Result) VALUES(1, 1, 2, '2012/01/01', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, ClubA, ClubB, StartTime, Result) VALUES(1, 3, 4, '2012/02/02', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, ClubA, ClubB, StartTime, Result) VALUES(1, 5, 6, '2012/03/03', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, ClubA, ClubB, StartTime, Result) VALUES(1, 7, 8, '2012/04/04', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, ClubA, ClubB, StartTime, Result) VALUES(1, 9, 10, '2012/05/05', '');
INSERT INTO tbl_matchlist(TypeLeaguesId, ClubA, ClubB, StartTime, Result) VALUES(1, 11, 12, '2012/06/06', '');

INSERT INTO tbl_matchlist(TypeLeaguesId, ClubA, ClubB, StartTime, Result) VALUES(1, 13, 14, '2012/07/07', '');

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,2)

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,4);

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,323);

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,2323)

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,12233);

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,332432);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,a4432);

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,2323);

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,2323);

INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC2','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC3','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC4','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC5','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC6','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC7','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC8','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC9','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC12','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC13','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)
VALUES('Thanhtc1#gmail','123456','ThanhTC14','images/resources/team-logo/Alania.jpg','2012/01/01',1,1,0);
INSERT INTO tbl_user(`Email`,`Password`,`FullName`,`Avatar`,`DOB`,`Gender`,`FavoriteTeam`,`Scores`)