LOAD DATA LOCAL INFILE 'SPEECHES.csv' 
INTO TABLE SPEECHES
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS(SpeechID,DebaterID,topic,JudgeID,feedback,transcript,score,relevancy,pitch,fluency);