<?php

class TypeLeagues{
	var $Id;
	var $Name;
}

class Leagues{
	var $Id;
	var $TypeLeaguesId;
	var $Name;
	var $ClubListOfLeaguesId;
	var $TableListOfLeaguesId;
}
class ClubListOfLeagues{
	var $Id;
	var $LeaguesId;
	var $ClubId;
}
class TableListOfLeagues{
	var $Id;
	var $LeaguesId;
	var $TableName;
	var $ClubListOfTableId;
}
class ClubListOfTable{
	var $Id;
	var $TableListOfLeaguesId;
	var $ClubId;
}
class Club{
	var $Id;
	var $Name;
	var $Logo;
	var $Scores;
}
class Matchlist{
	var $Id;
	var $LeaguesId;
	var $ClubA;
	var $ClubB;
	var $StartTime;
	var $Result;
}
class User{
	var $Id;
	var $Email;
	var $Password;
	var $FirstName;
	var $LastName;
	var $Avatar;
	var $DOB;
	var $Gender;
	var $Scores;
}
?>