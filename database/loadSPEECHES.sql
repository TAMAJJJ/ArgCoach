LOAD DATA LOCAL INFILE 'SPEECHES.csv' 
INTO TABLE SPEECHES
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS(SpeechID,DebaterID,topic,transcript,JudgeID,feedback,score);