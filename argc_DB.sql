CREATE TABLE USERS(
	UserID int(10) NOT NULL,
    /* Format need to be discussed*/
    Username VARCHAR(10) NOT NULL,
    Pass_word VARCHAR(10) NOT NULL,/*  password is reserved*/
    Usertype VARCHAR(5) NOT NULL,
    PRIMARY KEY (UserID)
 );

 CREATE TABLE SPEECHES(
	SpeechID INT(10) NOT NULL,/*  Localtime: YYYYMMDDHHMMSS*/
    DebaterID VARCHAR(10) NOT NULL,
    topic VARCHAR(10) NOT NULL,
    JudgeID INT(10) DEFAULT 0,
    feedback VARCHAR(500) DEFAULT NULL,
    score INT(10) DEFAULT 0,
    relevancy INT(10) DEFAULT 0,
    pitch INT(10) DEFAULT 0,
    fluency INT(10) DEFAULT 0,
    transcript VARCHAR(1000) DEFAULT NULL,
	PRIMARY KEY (SpeechID)
    -- FOREIGN KEY(DebaterID) 
    -- REFERENCES USERS(UserID),
	-- FOREIGN KEY(JudgeID)
    -- REFERENCES USERS(UserID)
 );
