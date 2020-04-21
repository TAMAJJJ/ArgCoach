CREATE TABLE USERS(
	UserID CHAR(10) NOT NULL,
    /* Format need to be discussed*/
    Username VARCHAR(10) NOT NULL,
    Pass_word VARCHAR(10) NOT NULL,/*  password is reserved*/
    Usertype VARCHAR(5) NOT NULL CHECK(Usertype = 'user' OR Usertype='coach'),
    PRIMARY KEY (USERID)
 );
 
 CREATE TABLE SPEECHES(
	SpeechID CHAR(10) NOT NULL,/*  Localtime: YYYYMMDDHHMMSS*/
    DebaterID CHAR(10) NOT NULL,
    topic VARCHAR(10) NOT NULL CHECK(topic = 'apple' OR topic='bananna'),
    transcript MEDIUMTEXT NOT NULL,
    JudgeID CHAR(10) NOT NULL,
    feedback TINYTEXT NOT NULL,
    score VARCHAR(3) NOT NULL,
	PRIMARY KEY (SpeechID),
    FOREIGN KEY(DebaterID) REFERENCES USERS(UserID),
	FOREIGN KEY(JudgeID) REFERENCES USERS(UserID)
 );
 


