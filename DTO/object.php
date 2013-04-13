<?php

class TypeLeagues{
	var $Id;
	var $Name;
}

class ClubListOfLeagues{
	var $Id;
	var $TypeLeaguesId;
	var $ClubId;
}
class TableListOfLeagues{
	var $Id;
	var $TypeLeaguesId;
	var $TableName;
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
	var $Played;
	var $Points;
	var $Won;
	var $Lost;
}
class Matchlist{
	var $Id;
	var $TypeLeaguesId;
	var $ClubA;
	var $ClubB;
	var $StartTime;
	var $Result;
}
class User{
	var $Id;
	var $Email;
	var $Password;
	var $FullName;
	var $Avatar;
	var $DOB;
	var $Gender;
	var $FavoriteTeam;
	var $Scores;
}
class Predict{
	var $UserId;
	var $MatchId;
	var $PredictResult;
}

class Groups{
	var $ClubId;
}
?>