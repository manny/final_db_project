
<?php


echo $_POST["email"]; 

select * from Owns,Games,Tags,Players where Players.GivenName=Tags.GivenName and Players.GivenName=Owns.First_Name and Players.GivenName='Joe' and Games.user_rating+web_rating>=ALL(select user_rating+web_rating from Games);







Select distinct title from TestGames g,Players,Owns where Players.GivenName='Samuel' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from TestGames g,Players,Owns where Players.GivenName='Samuel' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title);





Select distinct title from TestGames g,Players,Owns where Players.GivenName=Tags.GivenName and Players.Surname=Tags.Surname and Tags.Tag='INPUT' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from TestGames g,Players,Owns where Players.GivenName=Tags.GivenName and Players.Surname=Tags.Surname and Tags.Tag='INPUT' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title);

?>
