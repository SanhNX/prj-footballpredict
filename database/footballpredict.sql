create database footballpredict;
use footballpredict;

create table tbl_typeLeagues
(
	Id int AUTO_INCREMENT primary key,
	Name varchar(50) not null
);

create table tbl_leagues  
(
	Id int AUTO_INCREMENT not null,
	TypeLeaguesId int references tbl_typeLeagues(Id),
	Name varchar(50) not null,
	ClubListOfLeaguesId int references tbl_clubList(Id),
	TableListOfLeaguesId int references tbl_TableList(Id),
	primary key(Id, TypeLeaguesId)
);
create table tbl_clubListOfLeagues
(
	Id int AUTO_INCREMENT primary key not null,
	LeaguesId int references tbl_leagues(Id),
	ClubId int references tbl_club(Id)
);
create table tbl_tableListOfLeagues
(
	Id int AUTO_INCREMENT not null,
	LeaguesId int references tbl_leagues(Id),
	TableName varchar(50) not null,
	ClubListOfTableId int references tbl_clubListOfTable(Id),
	primary key(Id, LeaguesId)
);
create table tbl_clubListOfTable
(
	Id int AUTO_INCREMENT not null,
	TableListOfLeaguesId int references tbl_tableListOfLeagues(Id),
	ClubId int references tbl_club(Id),
	primary key(Id, TableListOfLeaguesId)
);
create table tbl_club
(
	Id int AUTO_INCREMENT primary key not null,
	Name varchar(50) not null,
	Scores int
);
create table tbl_matchlist
(
	Id int AUTO_INCREMENT primary key not null,
	LeaguesId int references tbl_leagues(Id),
	ClubA int references tbl_club(Id),
	ClubB int references tbl_club(Id),
	Result varchar(10)
);
create table tbl_User
(
	Id int AUTO_INCREMENT primary key not null,
	Email varchar(50) not null,
	Password varchar(50) not null,
	FirstName varchar(50) not null,
	LastName varchar(50) not null,
	Avatar varchar(50),
	DOB Datetime,
	Gender bit,
	Scores int
);